<?php
class HomeController
{

    private $queryUrl;
    private $menu;
    private $isValid;
    private $produk;
    private $kategori;
   
    const VALID_MENU = [
        'produk',
        'About' // Tambahkan ini
    ];

    const DEFAULT_MENU = 'home';

    public function __construct($queryUrl)
    {
        $this->produk = new Produk();
        $this->kategori = new Kategori();
       

        $this->queryUrl = $queryUrl ?? '';
        $this->parseQueryUri();
        $this->validateUri();
    }

    private function parseQueryUri()
    {
        parse_str($this->queryUrl, $parameters);
        $this->menu = $parameters['menu'] ?? self::DEFAULT_MENU;
    }

    private function validateUri()
    {
        // If the menu is 'home', skip normal validation and treat it as valid
        if ($this->menu === 'home') {
            $this->isValid = true;
        } else {
            $this->isValid = $this->isValidUri();
        }
    }

    private function isValidUri()
    {
        // Validate the menu, sub-menu, and action in one go
        return in_array($this->menu, self::VALID_MENU, true);
    }

    public function getContentPath()
    {
        // If the menu is 'home', return the default path
        if ($this->menu === 'home') {
            $path = "./views/home/index.php";
        } else {
            $path = "./views/home/{$this->menu}.php";
        }
        return $this->isValid ? realpath($path) : false;
    }

    //Bagian Tampilan Produk
    public function produkTerkini(): array
    {
        return $this->produk->latestProduk();
    }

    public function kategoris(): array
    {
        return $this->kategori->selectAll();
    }

    public function produkKategori($kategori): array
    {
        return $this->produk->produkByKategori($kategori);
    }

    public function findProduk($keyword): array
    {
        return $this->produk->cariProduk($keyword);
    }

}
