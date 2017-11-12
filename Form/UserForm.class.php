<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Form;

class UserForm {

    /**
     * 用户名
     *
     * 哈哈
     * @var string
     */
    private $username;
    /**
     * 用户ID
     *
     * 啊的放假
     * @var string
     */
    private $id;

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }



}