<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1\Assistant;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class ModelBuildOptions {
    /**
     * @param string $statusCallback The status_callback
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long. For example: v0.1
     * @return CreateModelBuildOptions Options builder
     */
    public static function create($statusCallback = Values::NONE, $uniqueName = Values::NONE) {
        return new CreateModelBuildOptions($statusCallback, $uniqueName);
    }

    /**
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long. For example: v0.1
     * @return UpdateModelBuildOptions Options builder
     */
    public static function update($uniqueName = Values::NONE) {
        return new UpdateModelBuildOptions($uniqueName);
    }
}

class CreateModelBuildOptions extends Options {
    /**
     * @param string $statusCallback The status_callback
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long. For example: v0.1
     */
    public function __construct($statusCallback = Values::NONE, $uniqueName = Values::NONE) {
        $this->options['statusCallback'] = $statusCallback;
        $this->options['uniqueName'] = $uniqueName;
    }

    /**
     * The status_callback
     * 
     * @param string $statusCallback The status_callback
     * @return $this Fluent Builder
     */
    public function setStatusCallback($statusCallback) {
        $this->options['statusCallback'] = $statusCallback;
        return $this;
    }

    /**
     * A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     * 
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long. For example: v0.1
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Autopilot.V1.CreateModelBuildOptions ' . implode(' ', $options) . ']';
    }
}

class UpdateModelBuildOptions extends Options {
    /**
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long. For example: v0.1
     */
    public function __construct($uniqueName = Values::NONE) {
        $this->options['uniqueName'] = $uniqueName;
    }

    /**
     * A user-provided string that uniquely identifies this resource as an alternative to the sid. Unique up to 64 characters long. For example: v0.1
     * 
     * @param string $uniqueName A user-provided string that uniquely identifies
     *                           this resource as an alternative to the sid. Unique
     *                           up to 64 characters long. For example: v0.1
     * @return $this Fluent Builder
     */
    public function setUniqueName($uniqueName) {
        $this->options['uniqueName'] = $uniqueName;
        return $this;
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Autopilot.V1.UpdateModelBuildOptions ' . implode(' ', $options) . ']';
    }
}