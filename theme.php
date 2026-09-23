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
