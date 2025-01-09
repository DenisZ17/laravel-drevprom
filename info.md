# Запуск проекта исходники
start - https://www.youtube.com/watch?v=_-t7rUznL94
laravel documentation

# Проект исходники
https://github.com/yelocode/laravel-blog-project
https://github.com/yelocode/tailwind-css-blog/blob/main/blog.html
# Команды
sail up -d                                    - запуск в detauch mode
sail stop                                     - остановить контейнеры
sail composer require laravel/jetstream       - установили jetstream
sail artisan jetstream:install livewire       - установили livewire
sail npm install                              - установили npm
sail npm run build                            - забилдили npm
sail npm run dev                              - запустили npm
sail artisan migrate                          - запустили миграции

- debug
dd()                                          - запусти и умри
dump()                                        - запусти

## Запуск проекта c нуля
0.1   На диске D создал пустую папку laravel_sail
0.2   Открыл папку через vscode 
0.3   Открыл терминал wsl
0.3.1 Запустил в терминале команду указав название проект laravel_sail_website
  -            curl -s https://laravel.build/laravel_sail_website | bash
0.4   Перешел в проект и запустил команду
  -            cd laravel_sail_website && ./vendor/bin/sail up
  -            ctrl + C                                                         // остановил проект
  -            ./vendor/bin/sail up -d                                          // перезапустил в detauch mode
0.5   Запустил команду чтобы делать запуск только с использованием sail
  -            alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
  -            sail node --version                                              // проверка версии node.js
0.6   Открываем сайт на localhost и делаем дополнительно миграцию

## Повторный запуск проекта
- перейти в папку               cd laravel_sail_website
- запустить команду             ./vendor/bin/sail up -d
- оптимизировать команду        alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
- запустить npm                 sail npm run dev



## Tutorial 1 https://www.youtube.com/watch?v=4g93AsneWZs&list=PLqDySLfPKRn5cEn5H2djYJNcmlaYWz-L3

Обзор проекта

6.00 открываем сайт https://jetstream.laravel.com/installation.html 
        - Jetstream provides the implementation for your application's login, registration, email verification, two-factor authentication, session management, API via Laravel Sanctum, and optional team management features.
        - копируем команду composer require laravel/jetstream
        - но для проекта с docker, впереди добавляем sail и запускаем по итогу  sail composer require laravel/jetstream 
7.00  устанавливаем по требованиям данного сайта livewire
        - запускаем в терминале команду sail artisan jetstream:install livewire
8.20  устанавливаем npm и запускаем его
        - sail npm install
        - sail npm run build
9.20  запускаем миграции
        - sail artisan migrate            // после запуска на главной странице появились ссылки Log in и Register

10.50 заходим в файл config/jetstream.php. В features закомментировали accountDeletion(), раскомментировали Features::termsAndPrivacyPolicy(), Features::profilePhotos(),

- 'features' => [
        Features::termsAndPrivacyPolicy(),
        Features::profilePhotos(),
        // Features::api(),
        // Features::teams(['invitations' => true]),
        // Features::accountDeletion(),
    ],
    теперь на странице profile появилась фича фото профиля.
    на странице register появился чекбокс c условиями и политикой

## Tutorial 2  https://www.youtube.com/watch?v=Fecxmo3IDSQ&list=PLqDySLfPKRn5cEn5H2djYJNcmlaYWz-L3&index=2 

Подключение плагинов для VSCODE

## Tutorial 3 https://www.youtube.com/watch?v=Njwbbfw_Qm0&list=PLqDySLfPKRn5cEn5H2djYJNcmlaYWz-L3&index=3

Updating Jetstream Layout | Build Blog with Laravel 10, Livewire 3 & Filament 3 #2

1.20    - layouts/app.blade.php используется для авторизованных пользователей     
        - layouts/guest.blade.php для неавторизованных
2.40    - замена контента app.blade.php на контент home из гита
4.40    - стили не работают, запустили sail npm run dev, success
5.30    - вырезали из app.blade.php тэги header и footer. Создали папку 
7.00    - рефакторинг
11.00   - стилизация лого, стилизация других элементов

## Tutorial 4 `https://www.youtube.com/watch?v=1uaXD6iJnWw&list=PLqDySLfPKRn5cEn5H2djYJNcmlaYWz-L3&index=4`

creating database schema | Build Blog with Laravel, Livewire & Filament #3
Создали модель поста, а вместе с ним миграцию(-m), фэктори(-f) и контроллер(-c)
- sail artisan make:model Post -m -c -f
Создали модель Category 
- sail artisan make:model Category -m -f
Создаем таблицу для связи Post и Category многие ко многим. В алфавитном порядке сначала указываем Category, а затем Post
- sail artisan make:migration create_category_post_table
4.40 формируем схему Post в файле \database\migrations\2024_05_22_144401_create_posts_table.php
-        Schema::create('posts', function (Blueprint $table) {
             $table->id();
            $table->foreignIdFor(User::class);
            
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->text('body');

            $table->timestamp('published_at')->nullable();
            $table->boolean('featured')->default(false);

            $table->softDeletes();                              // мягкое удаление читать в документации

            $table->timestamps();
        });
6.30 Схема для Category \database\migrations\2024_05_22_144508_create_categories_table.php
-        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('text_color')->nullable();
            $table->string('bg_color')->nullable();
            $table->timestamps();
        });
7.00 Схема для таблицы связи Category & Post database\migrations\2024_05_22_151736_create_category_post_table.php
-        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class);
            $table->foreignIdFor(Category::class);
            $table->timestamps();
        });

Добавили изменения в БД
- sail artisan migrate        

11.00 Заполняем \database\factories\PostFactory.php фейковыми данными
 с сайта https://fakerphp.github.io/
- public function definition(): array
    {
        return [
           'user_id' => User::factory(),
           'title'=> $this->faker->sentence(),
           'image'=> $this->faker->imageUrl(),
           'slug'=> $this->faker->slug(2),
           'body'=> $this->faker->paragraph(),
           'published_at'=> $this->faker->dateTimeBetween('-1 week','+1 week'),
           'featured' => $this->faker->boolean(10),
        ];
    }
12.10 заполняем \database\factories\CategoryFactory.php фэйковыми данными
-          public function definition(): array
    {
        return [
            "title"=> $this->faker->sentence(),
            "slug"=> $this->faker->slug(2),
        ];
    }
13.00 В \database\seeders\DatabaseSeeder.php добавляем код для заполнения таблицы фейковыми данными:
-       public function run(): void
    {
         Post::factory(100)->create();
         Category::factory(5)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
и запускаем для этого команду
- sail artisan db:seed

## Tutorial 5 `https://www.youtube.com/watch?v=nGyowsfRY5s&list=PLqDySLfPKRn5cEn5H2djYJNcmlaYWz-L3&index=5`
 Home Page | Build Blog with Laravel, Livewire & Filament #4

Меняем название welcome.blade.php на home.blade.php
Меняем маршрут в web.php с welcome на home
Вставляем заготовку home отсюда https://github.com/yelocode/tailwind-css-blog/blob/main/home.html и рефакторим

## Tutorial 6 `https://www.youtube.com/watch?v=sOTQ2brAtpI&list=PLqDySLfPKRn5cEn5H2djYJNcmlaYWz-L3&index=8`
Blog Page Stub | Build Blog with Laravel, Livewire & Filament #5

