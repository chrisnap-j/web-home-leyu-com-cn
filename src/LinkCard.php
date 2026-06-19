<?php
/**
 * Link Card Rendering Utility
 * 
 * Provides a function to generate an escaped HTML link card
 * with a title, description, and styled anchor element.
 */

function renderLinkCard(string $url, string $title, string $description = ''): string {
    // Escape all inputs to prevent XSS
    $escapedUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedDescription = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // Build the card HTML using a template
    $html = '<div class="link-card">';
    $html .= '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">';
    $html .= '<span class="card-title">' . $escapedTitle . '</span>';
    if ($escapedDescription !== '') {
        $html .= '<span class="card-description">' . $escapedDescription . '</span>';
    }
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

// Example usage with provided URL and keyword
$exampleUrl = 'https://web-home-leyu.com.cn';
$exampleTitle = '乐鱼体育';
$exampleDescription = '精彩体育赛事，尽在乐鱼体育';

$cardHtml = renderLinkCard($exampleUrl, $exampleTitle, $exampleDescription);

// In production, you would echo or include $cardHtml in your template.
// For testing, output the escaped HTML for verification.
echo $cardHtml;
?>