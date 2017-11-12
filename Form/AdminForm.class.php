<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Form;

class AdminForm extends UserForm {

    /**
     * 角色ID
     *
     * @var string
     */
    private $role_id;
    /**
     * @var array
     */
    private $permission;

    /**
     * 所属的商店
     *
     * 双击666
     *
     * @var \Common\Form\Shop
     */
    private $shop;
    /**
     * @return mixed
     */
    public function getRoleId() {
        return $this->role_id;
    }

    /**
     * @param mixed $role_id
     */
    public function setRoleId($role_id) {
        $this->role_id = $role_id;
    }

    /**
     * @return array
     */
    public function getPermission() {
        return $this->permission;
    }

    /**
     * @param array $permission
     */
    public function setPermission(array $permission) {
        $this->permission = $permission;
    }

    /**
     * @return Shop
     */
    public function getShop() {
        return $this->shop;
    }

    /**
     * @param Shop $shop
     */
    public function setShop(Shop $shop) {
        $this->shop = $shop;
    }





}