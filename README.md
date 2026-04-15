# Nova Theme for Pterodactyl

A modern, highly customizable theme for Pterodactyl Panel with glassmorphism effects, smooth animations, and stunning visuals inspired by the Nova design language.

## Features

### Visual Effects
- **Glassmorphism** - Frosted glass panels with customizable blur and saturation
- **Glow Effects** - Neon-style glows on interactive elements
- **Animated Backgrounds** - Optional animated gradient backgrounds
- **Smooth Animations** - Polished transitions throughout the interface

### Customization Options
- **6 Accent Colors** - Cyan, Purple, Pink, Orange, Green, Yellow
- **Glass Effect Controls** - Adjust blur amount, saturation, and colors
- **Dark & Light Modes** - Full support for both themes with independent settings
- **Feature Toggles** - Enable/disable effects based on preference

### Admin Panel Settings
1. **General Settings** - Logo, background image, basic colors
2. **Color Settings** - Full color palette customization
3. **Nova Theme Settings** - Advanced effects and accent colors
4. **Meta Settings** - SEO and social media tags
5. **Button Settings** - Danger, text button colors
6. **Element Manager** - Toggle UI components
7. **Alert Manager** - Alert styles and messages
8. **Social Manager** - Discord, billing, status page links

## Installation

### Automatic Installation
Run the installer script on your Pterodactyl Panel server:

```bash
curl -ssl https://raw.githubusercontent.com/denzivps/nova-theme-remake/refs/heads/main/theme.sh | sudo bash
```

### Manual Installation
1. Upload the theme files to your Pterodactyl Panel directory
2. Run the database migrations
3. Clear cache and rebuild assets

## Nova Theme Quick Start

After installation:
1. Go to **Admin Panel > Theme > Nova Theme**
2. Enable **Glassmorphism** for modern frosted glass effects
3. Enable **Animations** for smooth transitions
4. Enable **Glow Effects** for neon-style accents
5. Customize your **Accent Colors** to match your brand
6. Save and enjoy your new Nova theme!

## CSS Variables

The theme uses extensive CSS custom properties for customization:

### Core Variables
- `--primary`, `--secondary` - Main brand colors
- `--background-color` - Page background
- `--glass-bg`, `--glass-blur` - Glassmorphism settings

### Accent Variables
- `--accent-cyan`, `--accent-purple`, `--accent-pink`
- `--accent-orange`, `--accent-green`, `--accent-yellow`

### Utility Classes
```css
.glass          /* Apply glassmorphism effect */
.glass-light    /* Lighter glass variant */
.gradient-text  /* Gradient text effect */
.glow-effect    /* Glow shadow */
.hover-lift     /* Lift on hover */
```

## Browser Support
- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Opera 76+

## Credits
- Original theme by MrMister789
- Nova theme enhancements by the community
- Inspired by the Nova design language

## License
This theme is licensed under the MIT License.
