<?php
class IndexController extends Zend_Controller_Action
{
	function init()
	{

	}

    function indexAction()
    {
		$this->view->headMeta()->setName('description', '<b>KaiHost</b> - молодая компания по разработке, обслуживанию и продвижению сайтов для малого и среднего бизнеса, которая качественно и в короткие сроки разработает Ваш проект, используя современные WEB - технологии.');
		$this->view->headMeta()->setName('keywords', 'разработка, обслуживание, поддержка, хостинг');
	}

    function homeAction()
    {}

    function developAction()
    {
		$this->view->headTitle('Разработка', 'PREPEND');
		$this->view->headMeta()->setName('description', 'Используя свежие дизайнерские идеи и новейшие технологии мы сделаем Ваш сайт эффективным средством в продвижении товаров и услуг.');
		$this->view->headMeta()->setName('keywords', 'компании, разработка, интернет, услуги, сайт, ключ, установка, настройка, cms');
	}

    function servicesAction()
    {
		$this->view->headTitle('Обслуживание', 'PREPEND');
		$this->view->headMeta()->setName('description', 'Круглосуточная поддержка Вашего сайта в акутальном состоянии.');
		$this->view->headMeta()->setName('keywords', 'сайта, сайт, обслуживание');
	}

    function hostingAction()
    {
		$this->view->headTitle('Хостинг', 'PREPEND');
		$this->view->headMeta()->setName('description', 'Услуга по размещению Вашего сайта на нашем хостинге.');
		$this->view->headMeta()->setName('keywords', 'хостинг, услуги');
	}

	function brifAction()
	{
		$this->view->headTitle('Конструктор', 'PREPEND');
		$this->view->headMeta()->setName('description', 'Конструктор цен на разработку и обслуживание сайтов.');
	}

	function acceptAction()
	{
		// говно код :-)
		if ($this->getRequest()->isPost()) {
			$form = new Form_Mail();
			$price_map = array(
				'key' => array(
					'name' => 'разработке сайта под ключ',
					'type' => array(
						'type1' => array(
							'description' => 'Тип сайта: Визитка',
							'price' => 1000
						),
						'type2' => array(
							'description' => 'Тип сайта: Презинтационный',
							'price' => 1000
						),
						'type3' => array(
							'description' => 'Тип сайта: Блог',
							'price' => 5000
						),
						'type4' => array(
							'description' => 'Тип сайта: Корпоротивный',
							'price' => 6000
						),
						'type5' => array(
							'description' => 'Тип сайта: Интернет магазин',
							'price' => 10000
						),
						'type6' => array(
							'description' => 'Тип сайта: Информационный портал',
							'price' => 25000
						)
					),
					'decor' => array(
						'decor1' => array(
							'description' => 'Строгое оформление, минимум графики',
							'price' => 700
						),
						'decor2' => array(
							'description' => 'Обычное оформление, среднее количество графики',
							'price' => 2700
						),
						'decor3' => array(
							'description' => 'Креативное оформление, максимум графики',
							'price' => 5000
						)
					),
					'design-structure' => array(
						'design-structure1' => array(
							'description' => 'Стркутура дизайна: Легкая. Содержит 1, 2 колонки. Подходит для сайтов: Визитка, Презентационный, Блог',
							'price' => 500
						),
						'design-structure2' => array(
							'description' => 'Стркутура дизайна: Обычная. Содержит 2, 3 колонки. Подходит для сайтов: Блог, Корпоротивный',
							'price' => 1000
						),
						'design-structure3' => array(
							'description' => 'Стркутура дизайна: Сложная. Содержит 2, 3 колонки. Присутствуют различные элементы управления для взаимодействия с пользователем. Подходит для сайтов: Блог, Корпоротивный, Интернет-магазин, Информационный-портал',
							'price' => 3000
						)
					),
					'page' => array(
						'description' => 'Модуль: Страницы',
						'price' => 100
					),
					'feedback' => array(
						'description' => 'Модуль: Обратная связь - отправка сообщения Вам на e-mail с Вашего сайта',
						'price' => 100
					),
					'image-slider' => array(
						'description' => 'Модуль: Слайдер картинок',
						'price' => 200
					),
					'micro-news' => array(
						'description' => 'Модуль: Микро-новости, публикация небольших новостей',
						'price' => 500
					),
					'soc-auth' => array(
						'description' => 'Модуль: Авторизация для пользователей через социальные сети: facebook, vk, tweeter, g+',
						'price' => 500
					),
					'photos' => array(
						'description' => 'Модуль: Фото-галерея',
						'price' => 500
					),
					'brif' => array(
						'description' => 'Модуль: Бриф',
						'price' => 1000
					),
					'catalog' => array(
						'description' => 'Модуль: Каталог-продукций',
						'price' => 3000
					),
					'player' => array(
						'description' => 'Модуль: Аудио и видео плеер',
						'price' => 500
					)
				),
				'cms' => array(
					'name' => 'установке системы управления сайтом',
					'cms' => array(
						'cms1' => array(
							'description' => 'Система управления сайтом <strong>DLE</strong>',
							'price' => 50
						),
						'cms2' => array(
							'description' => 'Система управления сайтом <strong>Joomla</strong>',
							'price' => 50
						),
						'cms3' => array(
							'description' => 'Система управления сайтом <strong>Drupal</strong>',
							'price' => 50
						)
					),
					'blog' => array(
						'blog1' => array(
							'description' => 'Система управления блогом <strong>Wordpress</strong>',
							'price' => 50
						)
					),
					'forum' => array(
						'forum1' => array(
							'description' => 'Система управления форумом <strong>phpBB</strong>',
							'price' => 50
						),
						'forum2' => array(
							'description' => 'Система управления форумом <strong>IP.Board</strong>',
							'price' => 500
						)
					),
					'settings' => array(
						'description' => 'Настройка системы управления сайтом',
						'price' => 1000
					),
					'install-module' => array(
						'description' => 'Установка дополнительных модулей',
						'price' => 500
					),
					'install-template' => array(
						'description' => 'Установка шаблонов',
						'price' => 100
					),
					'create-template' => array(
						'description' => 'Создание шаблона',
						'price' => 2000
					)
				),
				'service' => array(
					'name' => 'обслуживанию сайта',
					'create-page' => array(
						'description' => 'Создание новой страницы',
						'price' => 100
					),
					'create-page' => array(
						'description' => 'Удаление старой страницы',
						'price' => 100
					),
					'del-page' => array(
						'description' => 'Создание новой страницы',
						'price' => 100
					),
					'update-page' => array(
						'description' => 'Обновление информации',
						'price' => 250
					),
					'add-media' => array(
						'description' => 'Добавление графических, видео и аудио материалов',
						'price' => 500
					),
					'install-module' => array(
						'description' => 'Установка модуля',
						'price' => 500
					),
					'config-module' => array(
						'description' => 'Настройка модуля',
						'price' => 300
					),
					'del-module' => array(
						'description' => 'Удаление модуля',
						'price' => 100
					),
					'create-module' => array(
						'description' => 'Разработка модуля <small>(цена зависит от сложности)</small>',
						'price' => 5000
					),
					'edit-template' => array(
						'description' => 'Незначительные изменения в дизайне',
						'price' => 600
					),
					'new-template' => array(
						'description' => 'Смена дизайна',
						'price' => 1000
					),
					'create-template' => array(
						'description' => 'Разработка нового дизайна <small>(цена зависит от сложности)</small>',
						'price' => 3000
					),
					'tarif' => array(
						'classic' => array(
							'description' => '<p>Тариф: <strong>Классический</strong></p>
                    <ul>
                      <li>Обновление информации на сайте</li>
                      <li>Создание новых и удаление старых страниц</li>
                      <li>Добавление графических, видео и аудио материалов</li>
                    </ul>',
							'price' => 3500
						),
						'universal' => array(
							'description' => '<p>Тариф: <strong>Универсальный</strong></p>
                    <ul>
                      <li>Обновление информации на сайте</li>
                      <li>Создание новых и удаление старых страниц</li>
                      <li>Добавление графических, видео и аудио материалов</li>
                      <li>Настройка модулей</li>
                      <li>Незначительные изменения в дизайне</li>
                    </ul>',
							'price' => 6500
						),
						'professional' => array(
							'description' => '<p>Тариф: <strong>Профессиональный</strong></p>
                    <ul>
                      <li>Обновление информации на сайте</li>
                      <li>Создание новых и удаление старых страниц</li>
                      <li>Добавление графических, видео и аудио материалов</li>
                      <li>Настройка модулей</li>
                      <li>Установка модулей</li>
                      <li>Удаление модулей</li>
                      <li>Незначительные изменения в дизайне</li>
                    </ul>',
							'price' => 9500
						)
					)
				)
			);

			$price = 0;
			$selected = [];
			if (array_key_exists($this->_getParam('hash'), $price_map)) {
				foreach ($this->_getAllParams() as $name => $value) {
					if (!array_key_exists($name, $price_map[$this->_getParam('hash')])) {
						continue;
					}

					$m = $price_map[$this->_getParam('hash')][$name];
					if (array_key_exists($value, $m)) {
						$m = $price_map[$this->_getParam('hash')][$name][$value];
					}

					$selected[] = $m['description'];
					$price = $price + $m['price'];
				}
			}
			ob_start();
        	echo '<div id="order-message">Вы выбрали услугу по ', $price_map[$this->_getParam('hash')]['name'], ' за ', $price, ' руб.<ul>';
			foreach($selected as $select) {
				echo '<li>', $select, '</li>';
			}
			echo '</ul></div>';
        	$out = ob_get_clean();
			$this->view->message = $out;
			$this->view->form = $form;
		} else {
			$this->redirect('/brif');
		}
	}

	function mailAction()
	{
		if ($this->getRequest()->isPost()) {
			$this->_helper->layout()->disableLayout();
			$this->_helper->viewRenderer->setNoRender();
			$form = new Form_Mail();

			if (!$form->isValid($_POST)) {
				$form->getElement('description')->setValue('');
				echo $form;
			} else {
				$tr = new Zend_Mail_Transport_Smtp('smtp.yandex.ru', array(
					'port' => 25,
					'auth' => 'login',
					'username' => 'master@kaihost.ru',
					'password' => 'Vbmr3qLM'
				));
				Zend_Mail::setDefaultTransport($tr);

				$body = '<p>Заказчик: ' . $this->_getParam('name') . '</p>';
				$body .= '<p>E-mail: ' . $this->_getParam('email') . '</p>';
				$body .= $this->_getParam('description');
				$mail = new Zend_Mail('utf-8');
				$mail->setBodyHtml($body);
				$mail->setFrom('master@kaihost.ru', 'Kaihost');
				$mail->addTo('eni.basic@gmail.com');
				$mail->setSubject('Заявка');
				$mail->send();
				echo 'ok';
			}
		} else {
			$this->redirect('/');
		}
	}

	function contactAction()
	{
		$this->view->headTitle('Контакты', 'PREPEND');
	}

	function testAction()
	{
		$this->_helper->layout()->disableLayout();
	}

}