=== Cursor Sample Plugin ===
Contributors: cursor
Tags: sample, shortcode, rest-api, settings
Requires at least: 5.6
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple sample plugin demonstrating a Settings page, a Shortcode, and a REST endpoint.

== Description ==

This plugin adds:

* Settings page under Settings → Cursor Sample
* Shortcode `[cursor_sample]` that renders the configured message
* REST endpoint `GET /wp-json/csp/v1/message` returning `{ "message": "..." }`

== Installation ==

1. Upload the `cursor-sample-plugin` folder to `/wp-content/plugins/` (or place it there directly).
2. In WordPress admin, go to Plugins and Activate "Cursor Sample Plugin".
3. (Optional) Go to Settings → Cursor Sample to customize the message.

== Usage ==

* Shortcode: add `[cursor_sample]` to any post or page.
* REST: request `/wp-json/csp/v1/message`.

== Uninstall ==

Uninstalling the plugin removes the `csp_message` option from the database.

== Changelog ==

= 1.0.0 =
* Initial release.

