import { Livewire, Alpine } from '../../../vendor/livewire/livewire/dist/livewire.esm';
import anchor from '@alpinejs/anchor'

document.addEventListener('livewire:init', () => {
    Livewire.hook('request', ({ fail }) => {
        fail(({ status, preventDefault }) => {
            if (status === 419) {
                window.location.reload()

                preventDefault()
            }
        })
    })
})

Alpine.store('notifications', {
    init () {
        Livewire.on('notify', e => {
            Alpine.store('notifications').addNotification(e)
        })
    },
    notifications: [],
    addNotification (notification) {
        notification = notification[0]
        notification.show = false
        notification.id = Date.now() + Math.floor(Math.random() * 1000)
        this.notifications.push(notification)

        // Update the notification to show it
        Alpine.nextTick(() => {
            this.notifications = this.notifications.map(notification => {
                if (notification.id === notification.id) {
                    notification.show = true
                }
                return notification
            })
        })

        setTimeout(() => {
            this.removeNotification(notification.id)
        }, notification.timeout || 5000)
    },
    removeNotification (id) {
        this.notifications = this.notifications
            .map(notification => {
                if (notification.id === id) {
                    notification.show = false
                }
                return notification
            })
            .filter(notification => notification.show) // This line filters out notifications that are not shown
    }
})

Alpine.store('confirmation', {
    show: false,
    loading: false,
    title: '',
    message: '',
    confirmText: 'Confirm',
    cancelText: 'Cancel',
    callback: null,

    confirm (options) {
        this.show = true
        this.loading = false
        this.title = options.title
        this.message = options.message
        this.confirmText = options.confirmText || 'Confirm'
        this.cancelText = options.cancelText || 'Cancel'
        this.callback = options.callback
    },

    async execute () {
        if (this.loading) return

        this.loading = true

        try {
            if (this.callback) {
                await this.callback()
                this.loading = false
            }
            this.close()
        } catch (error) {
            console.error('Callback failed:', error)
            this.close()
        }
    },

    close () {
        if (this.loading) return

        this.show = false
        this.loading = false
        this.callback = null
    }
})

Alpine.plugin(anchor)

if ('serviceWorker' in navigator) {
    navigator.serviceWorker
        .register('/service-worker.js')
        .then(function (registration) {
            // Yay! Registration successful
        })
        .catch(function (error) {
            console.log('Service Worker registration failed:', error)
        })

    navigator.serviceWorker.onmessage = function (event) {
        if (event.data && event.data.type === 'SHOW_NOTIFICATION') {
            Livewire.dispatch('notification-added', [event.data.notification])
            window.dispatchEvent(new CustomEvent('new-notification'))
        }
    }
}


Livewire.start()

/* ============================================================
   ASTRA — motion utilities
   ============================================================ */

// Page-transition progress bar, driven by Livewire's SPA-style navigation
document.addEventListener('livewire:navigate', () => {
    const bar = document.getElementById('astra-progress')
    if (!bar) return
    bar.classList.add('astra-progress-active')
    bar.style.width = '0%'
    requestAnimationFrame(() => {
        bar.style.width = '70%'
    })
})

document.addEventListener('livewire:navigated', () => {
    const bar = document.getElementById('astra-progress')
    if (!bar) return
    bar.style.width = '100%'
    setTimeout(() => {
        bar.classList.remove('astra-progress-active')
        bar.style.width = '0%'
    }, 300)
})

// Scroll-reveal: any element with class="astra-reveal" fades/rises into view once
function astraInitReveal () {
    const targets = document.querySelectorAll('.astra-reveal:not(.astra-in-view)')
    if (!targets.length) return

    if (!('IntersectionObserver' in window)) {
        targets.forEach(el => el.classList.add('astra-in-view'))
        return
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('astra-in-view')
                observer.unobserve(entry.target)
            }
        })
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' })

    targets.forEach(el => observer.observe(el))
}

// Animated count-up for stats: <span class="astra-counter" data-astra-count-to="12000" data-astra-suffix="+">
function astraInitCounters () {
    const counters = document.querySelectorAll('.astra-counter[data-astra-count-to]:not([data-astra-counted])')
    if (!counters.length || !('IntersectionObserver' in window)) return

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return
            const el = entry.target
            el.setAttribute('data-astra-counted', 'true')
            observer.unobserve(el)

            const target = parseFloat(el.dataset.astraCountTo || '0')
            const suffix = el.dataset.astraSuffix || ''
            const duration = 1200
            const start = performance.now()

            const step = (now) => {
                const progress = Math.min((now - start) / duration, 1)
                const eased = 1 - Math.pow(1 - progress, 3)
                const value = Math.round(target * eased)
                el.textContent = value.toLocaleString() + suffix
                if (progress < 1) requestAnimationFrame(step)
            }
            requestAnimationFrame(step)
        })
    }, { threshold: 0.3 })

    counters.forEach(el => observer.observe(el))
}

function astraInitMotion () {
    astraInitReveal()
    astraInitCounters()
}

document.addEventListener('DOMContentLoaded', astraInitMotion)
document.addEventListener('livewire:navigated', astraInitMotion)

