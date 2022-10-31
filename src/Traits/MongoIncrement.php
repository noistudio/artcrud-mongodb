<?php
namespace Artcrud_mongodb\Traits;


use MongoDB\Operation\FindOneAndUpdate;

trait MongoIncrement
{
    public function nextid()
    {
        // ref is the counter - change it to whatever you want to increment
        $this->last_id = self::getID($this->collection);
    }

    public static function bootUseAutoIncrementID()
    {
        static::creating(function ($model) {
            $model->sequencial_id = self::getID($model->getTable());
        });
    }
    public function getCasts()
    {
        return $this->casts;
    }

    private static function getID($collection="ref")
    {

        $seq = \DB::connection('mongodb')->getCollection('counters')->findOneAndUpdate(
            ['ref' => $collection],
            ['$inc' => ['seq' => 1]],
            ['new' => true, 'upsert' => true, 'returnDocument' => FindOneAndUpdate::RETURN_DOCUMENT_AFTER]
        );
        return $seq->seq;
    }
}
