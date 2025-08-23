# TechForum WordPress Theme

A professional, modern WordPress theme designed for tech communities, forums, and technology-focused websites.

## Features

### 🎨 Design & Layout
- Modern, responsive design
- Professional color scheme with CSS custom properties
- Mobile-first approach
- Sticky navigation header
- Hero section with customizable content
- Card-based layouts for posts and content

### 🔧 WordPress Integration
- Full WordPress theme support
- Custom post thumbnails
- Dynamic menus (Primary, Footer sections)
- Widget areas (Sidebar, Footer columns)
- Custom logo support
- Translation ready (i18n)
- SEO optimized

### 📱 Responsive Features
- Mobile-optimized navigation
- Responsive grid layouts
- Touch-friendly buttons and interactions
- Optimized images with multiple sizes

### 🚀 Performance
- Optimized CSS and JavaScript
- Lazy loading support
- Minimal external dependencies
- Clean, semantic HTML5 markup

### 🎯 Content Types
- Blog posts with full metadata
- Static pages
- Archive pages (category, tag, date)
- Search results
- 404 error page
- Author pages

### 💬 Community Features
- Comments system with enhanced styling
- Social sharing buttons
- Author bio sections
- Related posts
- Post navigation

## Installation

1. Download the theme files
2. Upload to `/wp-content/themes/forum-theme/`
3. Activate the theme in WordPress admin
4. Configure menus in Appearance > Menus
5. Customize settings in Appearance > Customize

## Customization

### Theme Customizer Options
- **Social Media Links**: Add Twitter, Facebook, GitHub, Discord URLs
- **Hero Section**: Customize title and description
- **Site Identity**: Logo, site title, tagline

### Menu Locations
- **Primary Menu**: Main navigation in header
- **Footer Menu**: Footer navigation links
- **Footer Resources**: Resource links in footer
- **Footer Support**: Support links in footer

### Widget Areas
- **Primary Sidebar**: Main sidebar for posts/pages
- **Footer Widget Area 1-3**: Three footer columns

### Custom Image Sizes
- `techforum-featured`: 800x400px (for featured posts)
- `techforum-thumbnail`: 300x200px (for post listings)
- `techforum-large`: 1200x600px (for single posts)

## File Structure

```
forum-theme/
├── assets/
│   ├── css/
│   └── js/
│       └── theme.js
├── templates/
│   └── index.html
├── 404.php
├── archive.php
├── comments.php
├── footer.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── screenshot.png
├── search.php
├── searchform.php
├── sidebar.php
├── single.php
└── style.css
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Development

### CSS Custom Properties
The theme uses CSS custom properties for easy color customization:

```css
:root {
    --primary: #2563eb;
    --secondary: #10b981;
    --dark: #1e293b;
    --light: #f8fafc;
    /* ... more variables */
}
```

### JavaScript Features
- Mobile menu toggle
- Smooth scrolling
- Search form enhancements
- Comment form validation
- Back to top button
- Social share popups

## Support

For support and customization requests, please contact the theme developer.

## License

This theme is licensed under the GNU General Public License v2 or later.

## Changelog

### Version 1.0
- Initial release
- Complete WordPress theme with all standard templates
- Responsive design
- Professional styling
- Dynamic content support
- Customizer integration
