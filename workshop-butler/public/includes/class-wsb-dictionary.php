<?php
/**
 * The file that defines the Dictionary class
 * @link       https://workshopbutler.com
 * @since      2.0.0
 *
 * @package    WSB_Integration
 */

/**
 * Dictionary class which provides an access to entities, loaded from API
 *
 * @since      2.0.0
 * @package    WSB_Integration
 * @author     Sergey Kotlov <sergey@workshopbutler.com>
 */
class WSB_Dictionary {
    
    /**
     * Removes a current event from the dictionary
     * @since 2.0.0
     */
    function clear_event() {
        unset($GLOBALS['wsb_event']);
    }
    
    /**
     * Removes all events from the dictionary
     * @since 2.0.0
     */
    function clear_events() {
        unset($GLOBALS['wsb_events']);
    }
    
    /**
     * Removes a current trainer from the dictionary
     * @since 2.0.0
     */
    function clear_trainer() {
        unset($GLOBALS['wsb_trainer']);
    }
    
    /**
     * Returns a currently-processed trainer or WP_Error if an API request failed
     *
     * @since  2.0.0
     * @return Trainer|null|WP_Error
     */
    function get_trainer() {
        if (!isset($GLOBALS['wsb_trainer'])) {
            return null;
        }
        $may_be_trainer = $GLOBALS['wsb_trainer'];
        if (is_wp_error($may_be_trainer)) {
            return $may_be_trainer;
        }
        if (!is_a($may_be_trainer, 'Trainer')) {
            return null;
        }
        return $may_be_trainer;
    }
    
    /**
     * Returns a currently-processed event or WP_Error if an API request failed
     *
     * @since  2.0.0
     * @return Event|WP_Error|null
     */
    function get_event() {
        if (!isset($GLOBALS['wsb_event'])) {
            return null;
        }
        $may_be_event = $GLOBALS['wsb_event'];
        if (is_wp_error($may_be_event)) {
            return $may_be_event;
        }
        if (!is_a($may_be_event, 'Event')) {
            return null;
        }
        return $may_be_event;
    }
    
    /**
     * Returns the attributes for a currently-processed event or null
     *
     * @since 2.0.0
     * @return array|null
     */
    function get_schedule_attrs() {
        if (!isset($GLOBALS['wsb_schedule_attrs'])) {
            return null;
        }
        return $GLOBALS['wsb_schedule_attrs'];
    }
    
    /**
     * Sets new schedule attributes
     *
     * @param $attrs array New schedule attrs
     * @since 2.0.0
     */
    function set_schedule_attrs($attrs) {
        $GLOBALS['wsb_schedule_attrs'] = $attrs;
    }
    
    /**
     * Returns a list of processed events
     *
     * @since  2.0.0
     * @return Event[]|null
     */
    function get_events() {
        if (!isset($GLOBALS['wsb_events']) || !is_array($GLOBALS['wsb_events'])) {
            return null;
        }
        return $GLOBALS['wsb_events'];
    }
    
    /**
     * Returns a currently-processed endorsement
     *
     * @since  2.0.0
     * @return object|null
     */
    function get_endorsement() {
        if (!isset($GLOBALS['wsb_endorsement']) || !is_object($GLOBALS['wsb_endorsement'])) {
            return null;
        }
        return $GLOBALS['wsb_endorsement'];
    }
    
    /**
     * Adds a loaded event to the dictionary
     *
     * @param Event|WP_Error $event Retrieved event or an error if an API request failed
     *
     * @since 2.0.0
     */
    function set_event($event) {
        $GLOBALS['wsb_event'] = $event;
    }
    
    /**
     * Adds a loaded trainer to the dictionary
     *
     * @param Trainer|WP_Error $trainer Retrieved trainer or an error if an API request failed
     *
     * @since 2.0.0
     */
    function set_trainer($trainer) {
        $GLOBALS['wsb_trainer'] = $trainer;
    }
    
    /**
     * Adds loaded events to the dictionary
     *
     * @param Event[] $events Retrieved events
     * @since 2.0.0
     */
    function set_events($events) {
        $GLOBALS['wsb_events']  = $events;
    }
    
}
