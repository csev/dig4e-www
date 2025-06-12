from bs4 import BeautifulSoup
import re

def indent_html_file(file_path):
    # Read the HTML file
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Parse HTML
    soup = BeautifulSoup(content, 'html.parser')
    
    # Pretty print with 2-space indentation
    pretty_html = soup.prettify()
    
    # Replace 4-space indentation with 2-space indentation
    pretty_html = re.sub(r'^    ', '  ', pretty_html, flags=re.MULTILINE)
    
    # Write the indented HTML back to the file
    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(pretty_html)

if __name__ == "__main__":
    indent_html_file('index.html') 