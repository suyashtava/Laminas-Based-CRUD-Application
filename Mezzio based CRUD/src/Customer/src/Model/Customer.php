<?php

declare(strict_types=1);

namespace Customer\Model;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Webmozart\Assert\Assert;

class Customer
{
    private UuidInterface $id;

    private int $brewery_id;

    private string $name;

    private int $cat_id;

    private int $style_id;

    private float $abv;

    private int $ibu;

    private int $srm;

    private int $upc;

    private string $filepath;

    private string $descript;

    private int $add_user;

    private \DateTimeImmutable $last_mod;



    public function __construct(


         int $brewery_id,

         string $name,

         int $cat_id,

         int $style_id,

         float $abv,

         int $ibu,

         int $srm,

         int $upc,

         string $filepath,

         string $descript,

         int $add_user

    ) {

            $this->id=Uuid::uuid4();

             $this->brewery_id=$brewery_id;

             $this->name=$name;

             $this->cat_id=$cat_id;

             $this->style_id=$style_id;

             $this->abv=$abv;

             $this->ibu=$ibu;

             $this->srm=$srm;

             $this->upc=$upc;

             $this->filepath=$filepath;

             $this->descript=$descript;

             $this->add_user=$add_user;

             $this->last_mod = new \DateTimeImmutable();

    }

    public function __unserialize(array $customerData): void
    {
        Assert::notEmpty($customerData['brewery_id'] ?? null, 'It is required.');
        Assert::notEmpty($customerData['name'] ?? null, 'It is required.');
        Assert::notEmpty($customerData['cat_id'] ?? null, 'It is required.');
        Assert::notEmpty($customerData['style_id'] ?? null, 'It is is required.');
        Assert::notEmpty($customerData['abv'] ?? null, 'It is is required.');
        Assert::notEmpty($customerData['ibu'] ?? null, 'It is is required.');
        Assert::notEmpty($customerData['srm'] ?? null, 'It is is required.');
        Assert::notEmpty($customerData['upc'] ?? null, 'It is is required.');
        Assert::notEmpty($customerData['descript'] ?? null, 'It is required.');
        Assert::notEmpty($customerData['add_user'] ?? null, 'It is required.');
        Assert::notEmpty($customerData['last_mod'] ?? null, 'It is required.');


        $id = Uuid::isValid($customerData['id']);
        Assert::true($id, 'Customer id has wrong format.');

        $last_mod = \DateTimeImmutable::createFromFormat('Y-m-d H:i', $customerData['createdAt']);
        Assert::isInstanceOf($last_mod, \DateTimeImmutable::class, 'Customer createdAt has wrong format.');

        $this->id = Uuid::fromString($customerData['id']);
        $this->name = $customerData['name'];
        $this->brewery_id = $customerData['brewery_id'];
        $this->cat_id = $customerData['cat_id'];
        $this->style_id = $customerData['style_id'];
        $this->abv = $customerData['abv'];
        $this->ibu = $customerData['ibu'];
        $this->srm = $customerData['srm'];
        $this->upc = $customerData['upc'];
        $this->descript = $customerData['descript'];
        $this->add_user = $customerData['add_user'];
        //$this->last_mod = $customerData['last_mod'];
        $this->last_mod = \DateTimeImmutable::createFromFormat('Y-m-d H:i', $customerData['last_mod']);


    }


    public function getid(): UuidInterface
    {
        return $this->lastName;
    }

    public function getIdString(): string
        {
            return $this->id->toString();
        }


    public function setid(string $id): void
    {
        $this->id = $id;
    }

    public function getname(): string
        {
            return $this->name;
        }

        public function setname(string $name): void
        {
            $this->lastName = $name;
        }

    public function getbrewery_id(): int
        {
            return $this->brewery_id;
        }

        public function setbrewery_id(string $brewery_id): void
        {
            $this->lastName = $brewery_id;
        }

    public function getcat_id(): int
        {
            return $this->cat_id;
        }

        public function setcat_id(string $cat_id): void
        {
            $this->lastName = $cat_id;
        }

    public function getstyle_id(): int
        {
            return $this->style_id;
        }

        public function setstyle_id(string $style_id): void
        {
            $this->lastName = $style_id;
        }

    public function getabv(): float
        {
            return $this->abv;
        }

        public function setabv(string $abv): void
        {
            $this->lastName = $abv;
        }

    public function getibu(): int
        {
            return $this->ibu;
        }

        public function setibu(string $ibu): void
        {
            $this->lastName = $ibu;
        }

    public function getsrm(): int
        {
            return $this->srm;
        }

        public function setsrm(string $srm): void
        {
            $this->lastName = $srm;
        }

    public function getupc(): int
        {
            return $this->upc;
        }

        public function setupc(string $upc): void
        {
            $this->upc = $upc;
        }

    public function getdescript(): string
        {
            return $this->descript;
        }

        public function setdescript(string $descript): void
        {
            $this->descript = $descript;
        }
    public function getadd_user(): int
        {
            return $this->add_user;
        }

        public function setadd_user(string $add_user): void
        {
            $this->lastName = $add_user;
        }

    public function getlast_mod(): string
        {
            return $this->last_mod;
        }

}
