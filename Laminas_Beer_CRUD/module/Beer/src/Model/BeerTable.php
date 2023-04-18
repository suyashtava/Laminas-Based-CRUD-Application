<?php
namespace Beer\Model;

use Beer\Model\Beer;
use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class BeerTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getBeer($id)
    {
        $id = (int) $id;
        $formset = $this->tableGateway->select(['id' => $id]);
        $row = $formset->current();
        if (!$row) {
            throw new RuntimeException(
                sprintf("Couldn't find the record with id %d", $id)
            );
        }
        return $row;
    }
    public function saveBeer(Beer $Beer)
    {
        $data = [
            'brewery_id' => $Beer->brewery_id,
            'name' => $Beer->name,
            'cat_id' => $Beer->cat_id,
            'email' => $Beer->email,
            'phone_number' => $Beer->phone_number,
        ];

        //$id = (int) $Beer->id;
        $id = (int) $Beer->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getAlbum($id);
        } catch (RuntimeException $e) {
             throw new RuntimeException(
                 sprintf("Can't update the Record with id %d", $id)
             );
        }
        $this->tableGateway->update($data, ['id'=>$id]);

        $this->tableGateway->update($data, ['id'=>$id]);
    }
    public function deleteBeer($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}
