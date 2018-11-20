<?php 

class CollectionTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items()
    {
        $collection = new \App\Support\Collection;
        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_item_passed_in()
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three']);

        $this->assertEquals($collection->count(),3);
    }

    /** @test */
    public function items_returned_matched_items_passed_in()
    {
        $collection = new \App\Support\Collection([
            'one', 'two']);

        $this->assertCount(2, $collection->get());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[1], 'two');
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new \App\Support\Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
        
    }

    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $items = [];
        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
        
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $collection2 = new \App\Support\Collection([
            'four', 'five'
        ]);
        
        $newCollection = $collection1->merge($collection2);

        $this->assertCount(5, $newCollection);
        $this->assertEquals(5, $newCollection->count());
        
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new \App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $collection->toJson());
        $this->assertInternalType('string', $collection->toJson());
    } 

    /** @test */
    public function json_encoding_a_collection_object_return_json()
    {
        $collection = new \App\Support\Collection([
            ['username' => 'alex'],
            ['username' => 'billy']
        ]);

        $encoded = json_encode($collection);

        $this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $encoded);
        $this->assertInternalType('string', $encoded);
    }
}


 ?>