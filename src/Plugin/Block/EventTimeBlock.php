<?php
/**
  * @file
  * contains \Drupal\event_time_service\Plugin\Block\EventTimeBlock
  */

namespace Drupal\event_time_service\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Acces\AccesResult;

/**
  * Provides an 'Event Time' Block
  * @Block(
  *		id = "event_time_block",
  *		admin_lael = @Translation("Event Time Block"),
  *	)
  */

class EventTimeBlock extends BlockBase {
	/**
	* {@inheritdoc}
	*/

	public function build() {
    /** @var \Drupal\node\Entity\Node $node */
    $node = \Drupal::routeMatch()->getParameter('node');
    $date = $node->field_event_date->date->format('m/d/Y');
    $service = \Drupal::service('event_time_service.event_time');

		return array('#markup' => $this->t($service->showTimeLeft($date)));
	}

  public function getCacheMaxAge() {
    return 0;
  }
}