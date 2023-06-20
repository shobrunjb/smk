<?php
namespace common\helpers;

use Yii;
use yii\base\Component;
//https://gist.github.com/JohnIncog/50f5cc9c5bec0703a7e9

class UUIDHelper extends Component {
/**
     * @param string $UUID Universal Unique Identifier.
     * @return array Containing the 4 numbers used to generate generateUUIDFromInts
     */
    public function getIntsFromUUID($UUID) {
        $parts = str_split(str_replace('-', '', $UUID), 8);
        $parts = array_map('hexdec', $parts);
        return $parts;
    }

    /**
     * Given an array of 4 numbers create a UUID
     *
     * @param arrat ints Ints to be converted to UUID.  4 numbers; last 3 default to 0
     * @return string UUID
     *
     * @throws Gdn_UserException
     */
    public function generateUUIDFromInts($ints) {
        if (sizeof($ints) != 4 && !isset($ints[0])) {
            throw new Gdn_UserException('Invalid arguments passed to ' . __METHOD__);
        }
        if (!isset($ints[1])) {
            $ints[1] = 0;
        }
        if (!isset($ints[2])) {
            $ints[2] = 0;
        }
        if (!isset($ints[3])) {
            $ints[3] = 0;
        }
        $result = static::hexInt($ints[0]) . '-' . static::hexInt($ints[1], true) . '-'
            . static::hexInt($ints[2], true).static::hexInt($ints[3]);
        return $result;
    }

    /**
     * Used to help generate UUIDs; pad and convert from decimal to hexadecimal; and split if neeeded
     *
     * @param $int Integer to be converted
     * @param bool $split Split result into parts.
     * @return string
     */
    public static function hexInt($int, $split = false) {
        $result = substr(str_pad(dechex($int), 8, '0', STR_PAD_LEFT), 0, 8);
        if ($split) {
            $result = implode('-', str_split($result, 4));
        }
        return $result;
    }

    /**
     * Get a random 32bit integer.  0x80000000 to 0xFFFFFFFF were not being tested with rand().
     *
     * @return int randon 32bi integer.
     */
    public function get32BitRand() {
        return mt_rand(0, 0xFFFF) | (mt_rand(0, 0xFFFF) << 16);
    }

    /**
     * Tests for generateUUIDFromInts and getIntsFromUUID
     */
    public function testUUID() {
        $cs = new Cleanspeak();
        $pass = true;
        for ($i=0; $i < 10000; $i++) {
            $a = array($cs->get32BitRand(), $cs->get32BitRand(), $cs->get32BitRand(), $cs->get32BitRand());
            $uuid = $cs->generateUUIDFromInts($a);
            $ints = $cs->getIntsFromUUID($uuid);
            if ($a != $ints) {
                $pass = false;
                echo "Test FAILED $i Random combinations\n";
                echo "UID: $uuid\n";
                echo "Input:" . var_export($a, true) . "\n";
                echo "Output:" . var_export($inta, true) . "\n";
            }
        }
        if ($pass) {
            echo "Test PASSED. $i Random combinations [0 - 0xFFFFFFFF]\n";
        }

    }	
}
?>
