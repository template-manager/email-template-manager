# Email Template Manager
A PHP tool for managing Email Templates

Simply create your email templates in html and anywhere you wish to change a value enter {{value-name}} now when you use the EmailTemplateManager class you can swap out those values just by using an array.

If you have a lot of duplicated content such as headers and footers you can use the file include tag for easier management for example {{file:header.html}} or {{file:footer.html}}

### Usage

<pre>
<code>&lt;?php
include_once('EmailTemplateManager.php');
$html = new EmailTemplateManager('new-signup.html');
$html = $html->swap(array(
    'first-name'  => 'Joe',
    'last-name'   => 'Bloggs'
));
//Now you can use the $html contents to send the email with your favourite client
</code>
</pre>
