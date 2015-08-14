<h1>Acuity Sample PHP Application.</h1>

<p>
This is the Acuity Sample PHP Application.
<?php if (!$acuity->isConnected()) { ?>Click connect to get started!<?php } ?>
</p>

<?php if (!$acuity->isConnected()) { ?>
<a href="<?php echo $authorizationUrl; ?>">Connect to Acuity</a>
<?php } else { ?>
<a href="/disconnect">Disconnect</a>
<h2>Hello, <?php echo $me['name']; ?></h2>
<p>Here is your client scheduling page:</p>
<iframe src="<?php echo $me['schedulingPage']; ?>" width="800" height="800" frameBorder="0"></iframe>
<script src="https://d3gxy7nm8y4yjr.cloudfront.net/js/embed.js" type="text/javascript"></script>
<h2>Daily Agenda for <?php echo $today; ?>:</h2>
<pre>
<?php print_r($agenda); ?>
<?php } ?>
