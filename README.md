<p align="center"><a href="https://smartystudio.net" target="_blank"><img src="https://camo.githubusercontent.com/c7a9296a3963705785bad1eab3108a82e6e9a7e50f6994d4c4bc03db7ee5e97e/68747470733a2f2f736d6172747973747564696f2e6e65742f77702d636f6e74656e742f75706c6f6164732f323032332f30362f736d617274792d677265656e2d6c6f676f2d736d616c6c2e706e67" width="100" alt="SmartyStudio Logo"></a></p>

# Smarty Studio - Change Admin Colors

[![Licence](https://img.shields.io/badge/LICENSE-GPL2.0+-blue)](./LICENSE)

- Developed by: [Smarty Studio](https://smartystudio.net) | [Martin Nestorov](https://github.com/mnestorov)
- Plugin URI: https://smartystudio.net/smarty-change-admin-colors

## Overview

Change admin colors based on the server (local, dev, staging, production).

## Description

The **SM - Change Admin Colors** plugin offers a dynamic way to change the WordPress admin dashboard's color scheme based on the server environment. This feature aids in distinguishing between local, development, staging, and production environments at a glance, reducing the risk of making unintended changes in the wrong environment. Developed by Smarty Studio and Martin Nestorov, this plugin integrates seamlessly into your WordPress setup, enhancing workflow efficiency and safety.

## Installation

1. **Download the Plugin**: Download the ZIP file from the repo.
2. **Upload to WordPress**:
   - Navigate to your WordPress admin panel.
   - Go to Plugins > Add New > Upload Plugin.
   - Choose the downloaded ZIP file and click 'Install Now.'
3. **Activate the Plugin**:
   - Once installed, click on 'Activate Plugin' to enable its features on your site.

## Usage

After activation, the plugin automatically detects your WordPress environment setting and changes the admin bar color accordingly based on `define('WP_ENVIRONMENT_TYPE', 'staging')` constant being set in your **wp-config.php** file.

- **Local**: Orange
- **Development**: Blue
- **Staging**: Purple
- **Production**: Green

No further configuration is required. The plugin works out of the box by utilizing the `wp_get_environment_type()` function to determine the current environment and applying the respective color to the admin bar.

## Changelog

For a detailed list of changes and updates made to this project, please refer to our [Changelog](./CHANGELOG.md).

---

## License

This project is released under the [GPL-2.0+ License](http://www.gnu.org/licenses/gpl-2.0.txt).
