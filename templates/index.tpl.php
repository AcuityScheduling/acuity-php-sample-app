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
  <h2>Daily Agenda for <?php echo $today; ?>:</h2>
  <ul>
  <?php foreach ($agenda as $appointment) { ?>
    <li>
    <?php echo "{$appointment['time']} &ndash; {$appointment['endTime']}: {$appointment['firstName']} {$appointment['lastName']} with {$appointment['calendar']}"; ?>
    </li>
  <?php } ?>
  </ul>
  <h2>Client Scheduling Page:</h2>
  <?php echo $acuity->getEmbedCode($me['id']); ?>
<?php } ?>
