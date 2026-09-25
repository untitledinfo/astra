<?php

return [
    'name' => 'Astra',
    'author' => 'Firepdx',
    'url' => 'https://github.com/Firepdx',

    'settings' => [
        [
            'name' => 'direct_checkout',
            'label' => 'Direct Checkout',
            'type' => 'checkbox',
            'default' => false,
            'database_type' => 'boolean',
            'description' => "Don't show the product overview page, go directly to the checkout page",
        ],
        [
            'name' => 'small_images',
            'label' => 'Small Images',
            'type' => 'checkbox',
            'default' => false,
            'database_type' => 'boolean',
            'description' => 'Show small images in the product overview page',
        ],
        [
            'name' => 'show_category_description',
            'label' => 'Show Category Description',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
            'description' => 'Show the category description in the product overview page/homepage',
        ],
        [
            'name' => 'logo_display',
            'label' => 'Logo display',
            'type' => 'select',
            'options' => [
                'logo-only' => 'Logo only',
                'logo-and-name' => 'Logo and Name',
            ],
            'default' => 'logo-and-name',
        ],
        [
            'name' => 'home_page_text',
            'label' => 'Home Page Text',
            'type' => 'markdown',
            'default' => "## Power Your Next Server.\nHigh-performance game and cloud hosting built for players, creators and communities.",
        ],

        // --- Astra: "Why choose us" bento features (v2 addition) ---
        [
            'name' => 'features_enabled',
            'label' => 'Show "Why choose us" Section',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
        ],
        [
            'name' => 'feature_1_title',
            'label' => 'Feature 1 — Title',
            'type' => 'text',
            'default' => 'NVMe-backed performance',
        ],
        [
            'name' => 'feature_1_text',
            'label' => 'Feature 1 — Text',
            'type' => 'text',
            'default' => 'Every plan runs on fast NVMe storage for quick loads and smooth gameplay.',
        ],
        [
            'name' => 'feature_2_title',
            'label' => 'Feature 2 — Title',
            'type' => 'text',
            'default' => 'Instant deployment',
        ],
        [
            'name' => 'feature_2_text',
            'label' => 'Feature 2 — Text',
            'type' => 'text',
            'default' => 'Your server spins up automatically the moment payment clears.',
        ],
        [
            'name' => 'feature_3_title',
            'label' => 'Feature 3 — Title',
            'type' => 'text',
            'default' => 'Real support',
        ],
        [
            'name' => 'feature_3_text',
            'label' => 'Feature 3 — Text',
            'type' => 'text',
            'default' => 'A ticket away whenever you need a hand.',
        ],
        [
            'name' => 'feature_4_title',
            'label' => 'Feature 4 — Title',
            'type' => 'text',
            'default' => 'Full control panel',
        ],
        [
            'name' => 'feature_4_text',
            'label' => 'Feature 4 — Text',
            'type' => 'text',
            'default' => 'Manage services, invoices and tickets from one dashboard.',
        ],

        // --- Astra: real stats strip (v2 addition) ---
        [
            'name' => 'stats_enabled',
            'label' => 'Show Stats Strip (real counts, not editable)',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
            'description' => 'Shows live customer and active-service counts pulled from your database.',
        ],

        // --- Astra: FAQ (v2 addition) ---
        [
            'name' => 'faq_enabled',
            'label' => 'Show FAQ Section',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
        ],
        [
            'name' => 'faq_1_q',
            'label' => 'FAQ 1 — Question',
            'type' => 'text',
            'default' => 'How fast is deployment?',
        ],
        [
            'name' => 'faq_1_a',
            'label' => 'FAQ 1 — Answer',
            'type' => 'textarea',
            'default' => 'Most services deploy automatically within a minute or two of payment clearing.',
        ],
        [
            'name' => 'faq_2_q',
            'label' => 'FAQ 2 — Question',
            'type' => 'text',
            'default' => 'Can I upgrade my plan later?',
        ],
        [
            'name' => 'faq_2_a',
            'label' => 'FAQ 2 — Answer',
            'type' => 'textarea',
            'default' => 'Yes — open a ticket or use the upgrade option on your service page any time.',
        ],
        [
            'name' => 'faq_3_q',
            'label' => 'FAQ 3 — Question',
            'type' => 'text',
            'default' => 'What payment methods do you accept?',
        ],
        [
            'name' => 'faq_3_a',
            'label' => 'FAQ 3 — Answer',
            'type' => 'textarea',
            'default' => 'Whatever payment gateways are enabled at checkout — see the payment step for the current list.',
        ],
        [
            'name' => 'faq_4_q',
            'label' => 'FAQ 4 — Question',
            'type' => 'text',
            'default' => 'How do I get support?',
        ],
        [
            'name' => 'faq_4_a',
            'label' => 'FAQ 4 — Answer',
            'type' => 'textarea',
            'default' => 'Open a support ticket from your dashboard and our team will get back to you.',
        ],

        // --- Astra: announcement bar ---
        [
            'name' => 'announcement_enabled',
            'label' => 'Show Announcement Bar',
            'type' => 'checkbox',
            'default' => false,
            'database_type' => 'boolean',
            'description' => 'Show a slim announcement bar above the navigation.',
        ],
        [
            'name' => 'announcement_text',
            'label' => 'Announcement Bar Text',
            'type' => 'text',
            'default' => 'New: instant deploy on all Minecraft plans.',
        ],
        [
            'name' => 'announcement_link',
            'label' => 'Announcement Bar Link (optional)',
            'type' => 'text',
            'default' => '',
        ],

        // --- Astra: visual effects toggles ---
        [
            'name' => 'glow_effects',
            'label' => 'Enable Glow / Shine Effects',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
            'description' => 'Ambient background glow, card hover glow and button shine. Automatically reduced for users with prefers-reduced-motion.',
        ],
        [
            'name' => 'grid_background',
            'label' => 'Enable Grid Background Pattern',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
        ],

        // --- Astra: optional custom background image (v2.2 addition) ---
        [
            'name' => 'background_image_url',
            'label' => 'Custom Background Image URL (optional)',
            'type' => 'text',
            'default' => '',
            'description' => 'When set, this replaces the animated aurora/grid background site-wide.',
        ],
        [
            'name' => 'background_image_opacity',
            'label' => 'Background Image Opacity (%)',
            'type' => 'text',
            'default' => '25',
        ],
        [
            'name' => 'background_image_blur',
            'label' => 'Background Image Blur (px)',
            'type' => 'text',
            'default' => '0',
        ],

        // --- Astra: nav layout (v2.2 addition) ---
        [
            'name' => 'nav_logo_center',
            'label' => 'Center the Logo in the Navbar',
            'type' => 'checkbox',
            'default' => false,
            'database_type' => 'boolean',
        ],
        [
            'name' => 'default_appearance',
            'label' => 'Default Appearance',
            'type' => 'select',
            'options' => [
                'dark' => 'Dark (recommended)',
                'light' => 'Light',
                'system' => 'System',
            ],
            'default' => 'dark',
        ],

        // --- Astra: footer ---
        [
            'name' => 'footer_text',
            'label' => 'Footer Text',
            'type' => 'text',
            'default' => '© ' . date('Y') . ' — Powered by Astra',
        ],
        [
            'name' => 'discord_url',
            'label' => 'Discord Link (optional)',
            'type' => 'text',
            'default' => '',
        ],

        // --- Astra: SEO ---
        [
            'name' => 'seo_description',
            'label' => 'Default Meta Description',
            'type' => 'textarea',
            'default' => 'High-performance Minecraft, game and cloud hosting with fast deployment, reliable infrastructure and a modern control panel experience.',
            'description' => 'Used as the fallback meta/OG/Twitter description on any page that does not set its own.',
        ],
        [
            'name' => 'seo_keywords',
            'label' => 'Meta Keywords (optional, comma separated)',
            'type' => 'text',
            'default' => '',
        ],
        [
            'name' => 'seo_og_image',
            'label' => 'Default Social Share Image URL (optional)',
            'type' => 'text',
            'default' => '',
            'description' => 'Used for og:image / twitter:image when a page does not set its own $image. Recommended size 1200x630.',
        ],
        [
            'name' => 'twitter_handle',
            'label' => 'Twitter/X Handle (optional, with @)',
            'type' => 'text',
            'default' => '',
        ],
        [
            'name' => 'seo_index',
            'label' => 'Allow Search Engines to Index This Site',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
        ],

        // --- Astra: advanced ---
        [
            'name' => 'custom_css',
            'label' => 'Custom CSS',
            'type' => 'textarea',
            'default' => '',
            'description' => 'Injected at the end of <head>. Use this instead of editing theme files directly so updates stay safe.',
            'required' => false,
        ],

        // --- Branding colors (Light) ---
        [
            'name' => 'primary',
            'label' => 'Primary - Brand Color (Light)',
            'type' => 'color',
            'default' => 'hsl(252, 100%, 69%)',
        ],
        [
            'name' => 'secondary',
            'label' => 'Secondary - Brand Color (Light)',
            'type' => 'color',
            'default' => 'hsl(189, 100%, 50%)',
        ],
        [
            'name' => 'neutral',
            'label' => 'Borders, Accents... (Light)',
            'type' => 'color',
            'default' => 'hsl(220, 20%, 88%)',
        ],
        [
            'name' => 'base',
            'label' => 'Base - Text Color (Light)',
            'type' => 'color',
            'default' => 'hsl(222, 47%, 11%)',
        ],
        [
            'name' => 'muted',
            'label' => 'Muted - Text Color (Light)',
            'type' => 'color',
            'default' => 'hsl(220, 9%, 46%)',
        ],
        [
            'name' => 'inverted',
            'label' => 'Inverted - Text Color (Light)',
            'type' => 'color',
            'default' => 'hsl(0, 0%, 100%)',
        ],
        [
            'name' => 'background',
            'label' => 'Background - Color (Light)',
            'type' => 'color',
            'default' => 'hsl(220, 20%, 98%)',
        ],
        [
            'name' => 'background-secondary',
            'label' => 'Background - Secondary Color (Light)',
            'type' => 'color',
            'default' => 'hsl(0, 0%, 100%)',
        ],

        // --- Branding colors (Dark) — the primary Astra experience ---
        [
            'name' => 'dark-primary',
            'label' => 'Primary - Brand Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(252, 100%, 74%)',
        ],
        [
            'name' => 'dark-secondary',
            'label' => 'Secondary - Brand Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(189, 100%, 55%)',
        ],
        [
            'name' => 'dark-neutral',
            'label' => 'Borders, Accents... (Dark)',
            'type' => 'color',
            'default' => 'hsl(230, 25%, 20%)',
        ],
        [
            'name' => 'dark-base',
            'label' => 'Base - Text Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(210, 40%, 98%)',
        ],
        [
            'name' => 'dark-muted',
            'label' => 'Muted - Text Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(217, 19%, 65%)',
        ],
        [
            'name' => 'dark-inverted',
            'label' => 'Inverted - Text Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(222, 47%, 11%)',
        ],
        [
            'name' => 'dark-background',
            'label' => 'Background - Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(230, 35%, 6%)',
        ],
        [
            'name' => 'dark-background-secondary',
            'label' => 'Background - Secondary Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(228, 30%, 9%)',
        ],
    ],
];
