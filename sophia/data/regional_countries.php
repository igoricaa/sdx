<?php
/**
 * Regional country groupings for filtering
 * Maps regions (US, UK, EU, AUS) to all countries and variations that belong to that region
 *
 * Used by Admin model for regional filtering in customers/buyers lists
 */

return [
    'US' => [
        // All United States variations
        'United States',
        'US',
        'USA',
        'U.S.A.',
        'U.S.',
        'America'
    ],

    'UK' => [
        // All United Kingdom variations
        'United Kingdom',
        'UK',
        'U.K.',
        'GB',
        'Great Britain',
        'England',
        'Scotland',
        'Wales',
        'Northern Ireland'
    ],

    'AUS' => [
        // All Australia variations
        'Australia',
        'AU',
        'AUS'
    ],

    'EU' => [
        // EU member countries (27 countries after Brexit)
        // Full country names
        'Austria',
        'Belgium',
        'Bulgaria',
        'Croatia',
        'Cyprus',
        'Czech Republic',
        'Denmark',
        'Estonia',
        'Finland',
        'France',
        'Germany',
        'Greece',
        'Hungary',
        'Ireland',
        'Italy',
        'Latvia',
        'Lithuania',
        'Luxembourg',
        'Malta',
        'Netherlands',
        'Poland',
        'Portugal',
        'Romania',
        'Slovakia',
        'Slovenia',
        'Spain',
        'Sweden',

        // Common abbreviations and variations
        'AT', 'Österreich',
        'BE',
        'BG',
        'HR',
        'CY',
        'CZ', 'Czechia',
        'DK', 'Danmark',
        'EE',
        'FI', 'Suomi',
        'FR',
        'DE', 'Deutschland',
        'GR', 'Hellas',
        'HU', 'Magyarország',
        'IE', 'Éire',
        'IT', 'Italia',
        'LV',
        'LT',
        'LU',
        'MT',
        'NL', 'Holland',
        'PL', 'Polska',
        'PT',
        'RO', 'România',
        'SK',
        'SI',
        'ES', 'España', 'Espana',
        'SE', 'Sverige'
    ]
];
