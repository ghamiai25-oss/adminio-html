# Ascend Theme - Demo Content

This folder contains demo content XML files for importing into your WordPress installation.

## Demo Variations

### 1. Demo Corporate (demo-corporate.xml)
- **Style:** Professional business
- **Pages:** Home, About, Services, Contact
- **Posts:** 2 sample blog posts
- **Portfolio:** 1 portfolio item
- **Best for:** Corporate websites, professional services

### 2. Demo Creative (Coming Soon)
- **Style:** Modern creative portfolio
- **Best for:** Agencies, freelancers, designers

### 3. Demo E-commerce (Coming Soon)
- **Style:** Online store
- **Best for:** WooCommerce shops

## How to Import Demo Content

### Method 1: Using WordPress Importer

1. **Install WordPress Importer**
   - Go to `Tools → Import` in WordPress admin
   - Click "WordPress" and install the importer plugin
   - Activate the plugin

2. **Import the Demo File**
   - Go to `Tools → Import → WordPress`
   - Click "Choose File" and select the demo XML file
   - Click "Upload file and import"

3. **Import Settings**
   - ✅ Check "Download and import file attachments"
   - Assign posts to an existing user or create new
   - Click "Submit"

4. **Wait for Import**
   - The import may take a few minutes
   - You'll see a success message when complete

### Method 2: Using Theme Demo Import

1. Go to `Appearance → Demo Import` in WordPress admin
2. Choose your preferred demo (Corporate, Creative, or E-commerce)
3. Click "Import Demo"
4. Wait for the import to complete

## After Import

### Set Up Pages

1. **Set Home Page**
   - Go to `Settings → Reading`
   - Select "A static page" for homepage
   - Choose "Home" as the homepage
   - Choose "Blog" as the posts page (if imported)
   - Save changes

2. **Set Up Menus**
   - Go to `Appearance → Menus`
   - Create a new menu or edit existing
   - Add pages to menu
   - Assign to "Primary Menu" location
   - Save menu

3. **Configure Widgets**
   - Go to `Appearance → Widgets`
   - Add widgets to sidebar and footer areas
   - Customize as needed

### Customize Theme

1. **Go to Customizer**
   - Navigate to `Appearance → Customize`
   - Or use "Customize" button in admin bar

2. **Theme Options**
   - Header Options: Choose layout, colors
   - Footer Options: Set copyright text
   - Typography: Select fonts
   - Social Media: Add your profiles
   - Blog Options: Configure sidebar

3. **Upload Logo**
   - In Customizer, go to `Site Identity`
   - Upload your logo (recommended: 300x60px)
   - Save & Publish

## Demo Content Included

### Pages
- Home (with hero section and services)
- About Us
- Services
- Contact

### Blog Posts
- Getting Started with WordPress
- 5 Tips for Better Website Performance

### Portfolio Items
- Corporate Website Redesign
- (More items in full demos)

### Categories
- Tutorials
- Performance
- Web Design (Portfolio)

## Troubleshooting

### Import Failed
- **Solution:** Increase PHP memory limit and execution time
- Add to `wp-config.php`:
  ```php
  define('WP_MEMORY_LIMIT', '256M');
  define('WP_MAX_MEMORY_LIMIT', '512M');
  ```

### Images Not Imported
- **Issue:** "Download and import file attachments" not checked
- **Solution:** Re-import with the option checked
- Or add images manually

### 404 Errors After Import
- **Solution:** Go to `Settings → Permalinks` and click "Save Changes"
- This refreshes permalink structure

### Missing Styles
- **Solution:** Clear browser cache and any caching plugins
- Regenerate CSS if using page builders

## Creating Your Own Content

After reviewing the demo, you can:

1. **Delete Demo Content**
   - Use "Bulk Actions → Move to Trash" in Posts/Pages
   - Or keep and modify as needed

2. **Add Your Content**
   - Replace demo text with your own
   - Upload your own images
   - Customize colors and fonts

3. **Keep Demo Structure**
   - Use demo pages as templates
   - Maintain layout and design
   - Just change content

## Need Help?

- **Documentation:** See `/documentation/index.html`
- **Support:** support@elevateworks.com
- **ThemeForest:** https://themeforest.net/user/elevateworks

## Notes

- Demo images are placeholders - replace with your own
- Customize colors to match your brand
- Test on staging site before importing to production
- Backup your site before importing

---

**Ascend Theme by ElevateWorks**  
*Built for Performance, Designed for Success*
