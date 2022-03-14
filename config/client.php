<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Company name
  |--------------------------------------------------------------------------
  |
  */

  'company' => env('FAW_COMPANY_NAME', 'Forum Architektur Winterthur'),

  /*
  |--------------------------------------------------------------------------
  | E-Mail settings
  |--------------------------------------------------------------------------
  |
  */

  'email' => [
    'from' => env('FAW_MAIL_FROM', 'marcel@jamon.digital'),
    'recipient' => env('FAW_MAIL_RECIPIENT', 'm@marceli.to'),
    'bcc' => env('FAW_MAIL_BCC', 'info@forum-architektur.ch'),
    'recipient_test' => env('FAW_MAIL_RECIPIENT_TEST', 'm@marceli.to')
  ],

  /*
  |--------------------------------------------------------------------------
  | Domain
  |--------------------------------------------------------------------------
  |
  */

  'domain' => env('FAW_DOMAIN', 'https://forum-architektur.ch'),

  /*
  |--------------------------------------------------------------------------
  | Chunk size for cron jobs
  |--------------------------------------------------------------------------
  |
  */

  'cron_chunk_size' => 3,
]
?>