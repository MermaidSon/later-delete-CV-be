<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Владелец резюме (Owner)
        DB::table('owners')->truncate();
        DB::table('owners')->insert([
            'name' => 'Виталий Сон',
            'position' => 'Software Engineer & Aspiring Tech Lead',
            'summary' => 'Системный решатель проблем, фокусирующийся на анализе, моделировании и реализации с учетом бизнес-потребностей и пользовательского опыта. Мой уникальный бэкграунд в маркетинге и журналистике (2022–2024) позволяет мне не просто писать код, но и эффективно переводить сложные технические концепции на язык бизнеса, выстраивать прозрачные процессы и расти в роли технического лидера.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Опыт работы (Resumes)
        DB::table('resumes')->truncate();
        $resumes = [
            [
                'position' => 'Lead Developer (promoted from Developer)',
                'company' => 'IGS (Island General Services)',
                'description' => 'Руководство кросс-функциональной командой, backend-разработка, администрирование БД и Linux-серверов. Лидировал инициативы по автоматизации логистики, модернизации легаси-систем (миграция с Delphi на Go) и оптимизации бизнес-процессов.',
                'started_at' => '2025-01-01',
                'ended_at' => null,
            ],
            [
                'position' => 'Преподаватель (Бизнес-аналитика и UML)',
                'company' => 'IT Top College',
                'description' => 'Разработка и проведение комплексного курса по бизнес-аналитике и UML-моделированию. Проведение лекций, практических занятий и экзаменов, менторство студентов.',
                'started_at' => '2024-09-01',
                'ended_at' => '2025-01-31',
            ],
            [
                'position' => 'Программист-техник, Наладчик программного оборудования',
                'company' => 'Политехнический колледж Сахалина',
                'description' => 'Очное обучение по специальности «Программирование в компьютерных системах». Окончил с государственным бюджетным финансированием и стипендией за академические успехи.',
                'started_at' => '2020-09-01',
                'ended_at' => '2024-06-30',
            ],
        ];

        $resumeIds = [];
        foreach ($resumes as $resumeData) {
            $id = DB::table('resumes')->insertGetId([
                'position' => $resumeData['position'],
                'company' => $resumeData['company'],
                'started_at' => $resumeData['started_at'],
                'ended_at' => $resumeData['ended_at'],
                'description' => $resumeData['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $resumeIds[] = $id;
        }

        // 3. Контакты (Contacts)
        DB::table('contacts')->truncate();
        DB::table('contacts')->insert([
            ['platform' => 'Email', 'link' => 'mailto:vitaliison.tech@gmail.com', 'text' => 'vitaliison.tech@gmail.com'],
            ['platform' => 'Phone', 'link' => 'tel:+79140912992', 'text' => '+7 914 091 29 92'],
            ['platform' => 'GitHub', 'link' => 'https://github.com/ImaSoGood', 'text' => 'github.com/ImaSoGood'],
            ['platform' => 'Location', 'link' => null, 'text' => 'Южно-Сахалинск, Россия'],
        ]);

        // 4. Технологический стек (Technologies)
        DB::table('technologies')->truncate();
        $techStack = [
            [
                'title' => 'Backend & Desktop',
                'description' => 'Разработка надежных серверных и десктопных приложений с акцентом на производительность и масштабируемость.',
                'items' => json_encode(['Go', 'C#', 'Delphi', 'PHP', 'Laravel']),
            ],
            [
                'title' => 'Базы данных',
                'description' => 'Проектирование, администрирование и оптимизация реляционных баз данных для высоких нагрузок.',
                'items' => json_encode(['PostgreSQL', 'MySQL/SQLite', 'FireBird (IBExpert)', 'Red Database']),
            ],
            [
                'title' => 'DevOps & Инструменты',
                'description' => 'Обеспечение согласованности окружения, контроль версий и управление процессами разработки.',
                'items' => json_encode(['Docker', 'Linux (Debian)', 'Git (GitLab)', 'YouTrack']),
            ],
            [
                'title' => 'Моделирование и Документация',
                'description' => 'Визуальное моделирование и проектирование нотаций для четкого взаимопонимания с заказчиками.',
                'items' => json_encode(['UML', 'BPMN', 'DMN', 'Camunda', 'Mermaid']),
            ],
        ];

        foreach ($techStack as $tech) {
            DB::table('technologies')->insert([
                'title' => $tech['title'],
                'description' => $tech['description'],
                'items' => $tech['items'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}