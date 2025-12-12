# Quick Start Guide - Local Testing

## 🚀 Get Started in 10 Minutes

This guide will help you quickly set up and test the Ascend theme locally.

---

## Step 1: Set Up Local WordPress (5 minutes)

### Option A: Using Local by Flywheel (Recommended)
1. Download: https://localwp.com/
2. Install and open Local
3. Click "Create a new site"
4. Site name: `ascend-test`
5. Choose "Preferred" environment (PHP 7.4+)
6. Set username/password
7. Click "Add Site"
8. Wait for installation to complete
9. Click "WP Admin" to access dashboard

### Option B: Using XAMPP
1. Download: https://www.apachefriends.org/
2. Install XAMPP
3. Start Apache and MySQL
4. Download WordPress: https://wordpress.org/download/
5. Extract to `xampp/htdocs/ascend-test/`
6. Visit `http://localhost/phpmyadmin`
7. Create database: `ascend_test`
8. Visit `http://localhost/ascend-test/`
9. Run WordPress installation

### Option C: Using MAMP
1. Download: https://www.mamp.info/
2. Install MAMP
3. Start servers
4. Follow similar steps as XAMPP

---

## Step 2: Install Ascend Theme (2 minutes)

### Upload Theme
1. Log into WordPress admin
2. Go to `Appearance → Themes`
3. Click `Add New → Upload Theme`
4. Choose the theme ZIP file (or navigate to the theme folder)
5. Click `Install Now`
6. Click `Activate`

### Verify Installation
- ✅ Theme activates without errors
- ✅ Visit site - homepage should display
- ✅ No error messages

---

## Step 3: Import Demo Content (3 minutes)

### Install WordPress Importer
1. Go to `Tools → Import`
2. Click `WordPress`
3. Click `Install Now`
4. Click `Activate Plugin & Run Importer`

### Import Demo
1. Click `Choose File`
2. Select `/demo-content/demo-corporate.xml`
3. Click `Upload file and import`
4. ✅ Check "Download and import file attachments"
5. Select user for posts
6. Click `Submit`
7. Wait for import to complete

### Set Homepage
1. Go to `Settings → Reading`
2. Select "A static page"
3. Homepage: `Home`
4. Posts page: (Leave blank or create Blog page)
5. Click `Save Changes`

### Create Menu
1. Go to `Appearance → Menus`
2. Create menu: `Main Menu`
3. Add pages: Home, About, Services, Contact
4. Assign to `Primary Menu`
5. Click `Save Menu`

---

## Step 4: Test Core Features (Quick Check)

### ✅ Quick Tests (2 minutes)

1. **Homepage** - Visit site, should display properly
2. **Customizer** - Go to `Appearance → Customize`
3. **Header** - Upload logo in Site Identity
4. **Colors** - Change header color in Header Options
5. **Menu** - Check navigation menu displays
6. **Footer** - Verify footer displays
7. **Blog** - Visit a blog post
8. **Portfolio** - Create a portfolio item
9. **Responsive** - Resize browser window
10. **Mobile** - Test on phone or DevTools

### Check for Errors
- Open Browser Console (F12)
- Look for red errors
- Should see no PHP errors

---

## Step 5: Test WooCommerce (Optional - 5 minutes)

### Install WooCommerce
1. Go to `Plugins → Add New`
2. Search "WooCommerce"
3. Click `Install Now`
4. Click `Activate`
5. Run setup wizard (skip store details for testing)

### Add Test Product
1. Go to `Products → Add New`
2. Name: "Test Product"
3. Price: $49.99
4. Add image
5. Click `Publish`

### Test Shop
1. Visit `Shop` page
2. Product should display
3. Click product
4. Click `Add to Cart`
5. Check cart icon in header
6. View cart page
7. Checkout page should display

---

## 📋 Essential Tests Checklist

### Must Test
- [ ] Theme activates without errors
- [ ] Homepage displays correctly
- [ ] Customizer opens and works
- [ ] Menus work
- [ ] Blog posts display
- [ ] Pages display
- [ ] Footer displays
- [ ] Mobile responsive
- [ ] No PHP errors
- [ ] No JavaScript errors

### Nice to Test
- [ ] Portfolio custom post type
- [ ] Team custom post type
- [ ] WooCommerce integration
- [ ] Contact form
- [ ] Search functionality
- [ ] Comments
- [ ] Widgets
- [ ] Multiple browsers

---

## 🐛 Common Issues & Fixes

### Issue: 404 Errors After Import
**Fix:** Go to `Settings → Permalinks` → Click `Save Changes`

### Issue: Images Not Displaying
**Fix:** Make sure "Download and import file attachments" was checked during import

### Issue: Menu Not Showing
**Fix:** Create menu and assign to Primary Menu location

### Issue: Customizer Changes Not Saving
**Fix:** Check browser console for errors, disable conflicting plugins

### Issue: Theme Looks Broken
**Fix:** Clear browser cache, check if CSS file is loading

---

## 📊 Quick Performance Check

### PageSpeed Test
1. Visit https://pagespeed.web.dev/
2. Enter your local site URL (use ngrok for localhost)
3. Check scores:
   - Mobile: Should be > 80
   - Desktop: Should be > 90

### Browser DevTools
1. Press F12
2. Go to Network tab
3. Reload page
4. Check:
   - Load time < 3 seconds
   - Total size < 2 MB
   - No 404 errors

---

## 🎨 Customize Your Test Site

### Quick Customizations
1. **Logo:** `Appearance → Customize → Site Identity`
2. **Colors:** `Appearance → Customize → Ascend Theme Options → Header Options`
3. **Footer Text:** `Appearance → Customize → Ascend Theme Options → Footer Options`
4. **Fonts:** `Appearance → Customize → Ascend Theme Options → Typography`
5. **Social Media:** `Appearance → Customize → Ascend Theme Options → Social Media`

---

## 📱 Mobile Testing

### Using Browser DevTools
1. Press F12
2. Click device toggle icon (or Ctrl+Shift+M)
3. Select device: iPhone, iPad, etc.
4. Test navigation, layout, forms
5. Try landscape orientation

### On Real Device
1. Find your local IP: `ipconfig` (Windows) or `ifconfig` (Mac)
2. On mobile, visit `http://[your-ip]/ascend-test/`
3. Test all features

---

## 🔄 Testing Workflow

### Daily Testing Routine
1. Activate theme
2. Import fresh demo content
3. Test 1-2 features thoroughly
4. Document any issues
5. Fix issues
6. Repeat

### Before Submission
1. Run full TESTING-CHECKLIST.md
2. Test on multiple browsers
3. Test on multiple devices
4. Check all documentation
5. Create final screenshot
6. Package theme

---

## 📞 Get Help

### Resources
- **Full Testing Guide:** See `TESTING-CHECKLIST.md`
- **Documentation:** Open `/documentation/index.html`
- **Demo Import:** See `/demo-content/README.md`
- **Theme Status:** See `THEMEFOREST-STATUS.md`

### Support
- **Email:** support@elevateworks.com
- **WordPress Forums:** https://wordpress.org/support/
- **ThemeForest:** https://themeforest.net/user/elevateworks

---

## ✅ You're Ready!

If you can complete these steps successfully, your theme is working correctly!

### Next Steps:
1. ✅ Complete quick tests above
2. 📋 Run full TESTING-CHECKLIST.md
3. 🐛 Fix any issues found
4. 📸 Create screenshot.png
5. 📦 Package for submission

---

## 🎯 Success Indicators

Your theme is ready if:
- ✅ No PHP errors or warnings
- ✅ No JavaScript console errors
- ✅ All pages load correctly
- ✅ Customizer works
- ✅ Responsive design works
- ✅ WooCommerce integrates (if installed)
- ✅ Demo imports successfully
- ✅ Performance is good (PageSpeed > 80)

---

**Time to Complete:** ~20 minutes
**Difficulty:** Easy
**Prerequisites:** Local WordPress installation

**Ready to dive deeper?** See `TESTING-CHECKLIST.md` for comprehensive testing.

---

*Happy Testing! 🎉*

**Ascend Theme by ElevateWorks**  
*Built for Performance, Designed for Success*
