<?php

namespace common\modules\user\classes;

use yii\authclient\Collection;
use Yii;

/**
 * Список конфигураций клиентов соцсетей, разбитый по порталам.
 *
    'portalClients' => [
        'cool-portal.ru' => [
                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => '123123123123123',
                    'clientSecret' => 'a1b2c3d4a1b2c3d4a1b2c3d4a1b2c3d4',
                ],
                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => '1231231',
                    'clientSecret' => 'AbCdEf1AbCdEf1AbCdEf',
                ],
            ],
        'mega-portal.ru' => [
                ...
            ],
        'super-portal.ru' => [
                ...
            ],
    ],
 *
 * @property ClientInterface[] $clients List of auth clients. This property is read-only.
 */
class PortalCollection extends Collection
{
    public $portalClients = [];
    
    public function init()
    {
        $this->clients = $this->getClientsByCurrentPortal();
    }
    
    /**
     * Опеределяем настройки соцсетей по текущему порталу.
     * @return array
     */
    public function getClientsByCurrentPortal()
    {
        $currentPortal = $this->getPortal();
        // Ищем текущий портал в настройках.
        if (!empty($this->portalClients)) {
            foreach ($this->portalClients as $portal => $config) {
                if ($portal === $currentPortal) {
                    return $config;
                }
            }
        }
        // По умолчанию - пустой массив клиентов.
        // Нам не нужно, чтобы без настроек сайт перестал работать целиком.
        // Пусть просто отключится интеграция с соцсетями.
        return [];
    }
    
    /**
     * Возвращаем базовый домен портала.
     * @return string
     */
    public function getPortal()
    {
        $sdn = explode('.', Yii::$app->request->serverName);
        $count = count($sdn);
        $portal = $sdn[$count - 2] . '.' . $sdn[$count - 1];
        return $portal;
    }
}
