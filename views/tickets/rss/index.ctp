<?php 
$this->set('documentData', array(
    'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));

$this->set('channelData', array(
    'title' => __("SOS Recent Tickets", true),
    'link' => $this->Html->url('/', true),
    'description' => __("Simplified Online Support recent tickets", true),
    'language' => 'en-us'));
	
	foreach ($tickets as $ticket) {
    $ticketTime = strtotime($ticket['Ticket']['created']);
	$ticketTitle = $ticket['Ticket']['school'].' '.$ticket['Ticket']['system'].': '.$ticket['Ticket']['module'];
	$ticketAuthor = 'Admin';
    $ticketLink = array(
        'controller' => 'tickets',
        'action' => 'view',
        $ticket['Ticket']['id']);
    // You should import Sanitize
    App::import('Sanitize');
    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $ticket['Ticket']['content']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => $ticketTitle,
        'link' => $ticketLink,
        'guid' => array('url' => $ticketLink, 'isPermaLink' => 'true'),
        'description' =>  $bodyText,
        'dc:creator' => $ticketAuthor,
        'pubDate' => $ticket['Ticket']['created']));
}