<h1 align="center">Laravel Transaction app Setup Guide</h1>
<p align="center">A comprehensive guide to set up your Laravel transactoion project on your local machine.</p>
<h1>Prerequisites</h1>
<p>Before you begin, ensure you have the following installed:</p>
<ul>
    <li>PHP (version >= 7.4)</li>
    <li>Composer</li>
    <li>MySQL or any compatible database server</li>
</ul>
<h1 align="center">Follow the steps:</h1>
<ol>
    <li>Create database and write your database name into .env file</li>
    <li>composer install</li>
    <li>composer update</li>
    <li>php artisan key:generate</li>
    <li>php artisan migrate</li>
    <li>php artisan db:seed </li>
</ol>
<h4 align="center">Commands in the console:</h4>
<ul>
    <li>
        For example user 1 sends money to user 2  amount=10.00 <br>
        php artisan money:send 1 2 10.00
    </li>
    <li>checking user's balance with the id:1<br>
        php artisan money:balance 1
    </li>
</ul>
