# SM - Change Admin Colors

[![Licence](https://img.shields.io/badge/LICENSE-GPL2.0+-blue)](./LICENSE)

- **Developed by:** Martin Nestorov 
    - Founder and Lead Developer at [Smarty Studio](https://smartystudio.net) | Explore more at [nestorov.dev](https://github.com/mnestorov)
- **Plugin URI:** https://github.com/mnestorov/smarty-change-admin-colors

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

## Support The Project

If you find this script helpful and would like to support its development and maintenance, please consider the following options:

- **_Star the repository_**: If you're using this script from a GitHub repository, please give the project a star on GitHub. This helps others discover the project and shows your appreciation for the work done.

- **_Share your feedback_**: Your feedback, suggestions, and feature requests are invaluable to the project's growth. Please open issues on the GitHub repository or contact the author directly to provide your input.

- **_Contribute_**: You can contribute to the project by submitting pull requests with bug fixes, improvements, or new features. Make sure to follow the project's coding style and guidelines when making changes.

- **_Spread the word_**: Share the project with your friends, colleagues, and social media networks to help others benefit from the script as well.

- **_Donate_**: Show your appreciation with a small donation. Your support will help me maintain and enhance the script. Every little bit helps, and your donation will make a big difference in my ability to keep this project alive and thriving.

Your support is greatly appreciated and will help ensure all of the projects continued development and improvement. Thank you for being a part of the community!
You can send me money on Revolut by following this link: https://revolut.me/mnestorovv

---

## License

This project is released under the [GPL-2.0+ License](http://www.gnu.org/licenses/gpl-2.0.txt).
