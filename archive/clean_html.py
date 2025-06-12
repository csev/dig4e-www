import os
from bs4 import BeautifulSoup
import re

def clean_html_file(file_path):
    # Read the HTML file
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Parse HTML
    soup = BeautifulSoup(content, 'html.parser')
    
    # Remove all script tags
    for script in soup.find_all('script'):
        script.decompose()
    
    # Remove all style tags
    for style in soup.find_all('style'):
        style.decompose()
    
    # Remove WordPress-specific classes and IDs
    for tag in soup.find_all(True):
        # Remove WordPress classes
        if tag.get('class'):
            tag['class'] = [c for c in tag['class'] if not any(wp_class in c.lower() for wp_class in 
                ['wp-', 'wordpress', 'elementor', 'mega-menu', 'site-', 'navigation', 'header', 'footer'])]
            if not tag['class']:
                del tag['class']
        
        # Remove WordPress IDs
        if tag.get('id'):
            if any(wp_id in tag['id'].lower() for wp_id in 
                ['wp-', 'wordpress', 'elementor', 'mega-menu', 'site-', 'navigation', 'header', 'footer']):
                del tag['id']
    
    # Remove WordPress-specific divs
    for div in soup.find_all('div', class_=lambda x: x and any(wp_class in x.lower() for wp_class in 
        ['wp-', 'wordpress', 'elementor', 'mega-menu', 'site-', 'navigation', 'header', 'footer'])):
        div.decompose()
    
    # Create a new basic HTML structure
    new_html = f"""<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{soup.title.string if soup.title else 'Document'}</title>
</head>
<body>
    {soup.body.decode_contents() if soup.body else ''}
</body>
</html>"""
    
    # Write the cleaned HTML back to the file
    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(new_html)

def main():
    # Get all HTML files in the current directory
    html_files = [f for f in os.listdir('.') if f.endswith('.html')]
    
    for html_file in html_files:
        print(f"Cleaning {html_file}...")
        try:
            clean_html_file(html_file)
            print(f"Successfully cleaned {html_file}")
        except Exception as e:
            print(f"Error cleaning {html_file}: {str(e)}")

if __name__ == "__main__":
    main() 