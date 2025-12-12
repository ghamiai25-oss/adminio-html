#!/bin/bash

# Script to generate complete POT translation file
# Run this from theme root directory

echo "Generating POT file for Ascend theme..."

# Check if wp-cli is available
if command -v wp &> /dev/null; then
    echo "Using WP-CLI to generate POT file..."
    wp i18n make-pot . languages/ascend.pot --domain=ascend --headers='{"Report-Msgid-Bugs-To":"https://themeforest.net/user/elevateworks"}'
    echo "✅ POT file generated successfully with WP-CLI"
else
    echo "⚠️  WP-CLI not found. Install it for best results:"
    echo "   https://wp-cli.org/#installing"
    echo ""
    echo "Alternative: Use Poedit to generate POT file"
    echo "1. Download Poedit: https://poedit.net/"
    echo "2. Open Poedit"
    echo "3. File → New from source code"
    echo "4. Select theme directory"
    echo "5. Save as languages/ascend.pot"
fi

echo ""
echo "Manual string extraction completed in languages/ascend.pot"
echo "Remember to translate or provide to translators"
