<?php

require_once 'db.php';

class Pagination {

    private $sql;
    private $page;
    private $maxRows;
    private $offset;
    private $maxPage;

    private $dictPages = array(
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five'
    );

    public function __construct($sql, $maxRows = 10) {
        $this->sql = $sql;
        $this->maxRows = $maxRows;
        $this->configure();
    }

    private function configure() {
        $this->page = $_REQUEST['page'] ?? 1;
        $this->offset = ($this->page-1) * $this->maxRows;
    }

    private function paramPage($param) {
        return '?page=' . $param;
    }

    private function countRows() {
        $sqlCountRows = 'SELECT COUNT(0) FROM ( ' . $this->sql . ' ) as countRows ';
        $resCountRows = DB::pdo()->query($sqlCountRows);
        return $resCountRows->fetchColumn(0);
    }

    public function getPage() {
        return $this->page;
    }

    public function getMaxPage() {
        return $this->maxPage;
    }

    public function showStartNav() {
        return !!($this->page > 3);
    }

    public function showEndNav() {
        return !!($this->page < $this->maxPage-2);
    }

    public function paginate() {
        $countRows = $this->countRows();
        $this->maxPage = $countRows > 0 ? intval(ceil($countRows / $this->maxRows)) : 1;
        $sqlPage = $this->sql  . " limit $this->offset, $this->maxRows";
        return DB::pdo()->query($sqlPage)->fetchAll();
    }

    public function nav() {
        if ($this->page < 4) {
            $paginate = array(
                'one' => array('label' => '1', 'link' => $this->paramPage('1')),
                'two' => array('label' => '2', 'link' => $this->paramPage('2')),
                'three' => array('label' => '3', 'link' => $this->paramPage('3')),
                'four' => array('label' => '4', 'link' => $this->paramPage('4')),
                'five' => array('label' => '5', 'link' => $this->paramPage('5'))
            );

            // Disable click on Current Page
            $paginate[$this->dictPages[$this->page]]['link'] = null;
        }
        else if ($this->page > $this->maxPage-3) {
            $paginate = array(
                'one' => array('label' => $this->maxPage-4, 'link' => $this->paramPage($this->maxPage-4)),
                'two' => array('label' => $this->maxPage-3, 'link' => $this->paramPage($this->maxPage-3)),
                'three' => array('label' => $this->maxPage-2, 'link' => $this->paramPage($this->maxPage-2)),
                'four' => array('label' => $this->maxPage-1, 'link' => $this->paramPage($this->maxPage-1)),
                'five' => array('label' => $this->maxPage, 'link' => $this->paramPage($this->maxPage))
            );

            // Disable click on Current Page
            $disablePage = abs($this->maxPage - $this->page - 5);
            $paginate[$this->dictPages[$disablePage]]['link'] = null;
        }
        else {
            $paginate = array(
                'one' => array('label' => $this->page-2, 'link' => $this->paramPage($this->page-2)),
                'two' => array('label' => $this->page-1, 'link' => $this->paramPage($this->page-1)),
                'three' => array('label' => $this->page, 'link' => null),
                'four' => array('label' => $this->page+1, 'link' => $this->paramPage($this->page+1)),
                'five' => array('label' => $this->page+2, 'link' => $this->paramPage($this->page+2))
            );
        }

        return $paginate + array('current' => $this->page) + array('last' => $this->maxPage);
    }
}
