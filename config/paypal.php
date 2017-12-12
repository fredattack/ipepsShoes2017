<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 08-11-17
 * Time: 10:46
 */

return array(
    /** set your paypal credential **/
    'client_id' =>'Ae7LJ5-PTul88GNp-DbMXloYurtkgDrH5PgoSqmiTGnFqQv4tTYJ2KUfOFH_v8Sc2iPd9cBGmQmleFby',
    'secret' => 'EBxvr-Ph2WrJJdODH5a3V7oz6D_umtHIFNOTTfrBUsefAfmxecuP_giS2dnMyeKhebtIBRc9qu111qt_',
    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 1000,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);