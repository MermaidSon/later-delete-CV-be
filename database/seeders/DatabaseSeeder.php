<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Опыт работы и образование (Resumes)
        $resumes = [
            [
                'position' => 'Lead Developer (promoted from Developer)',
                'company' => 'IGS (Island General Services)',
                'description' => 'Lead a cross-functional team, backend development, DB administration, and Linux server administration. Spearheaded logistics automation, legacy modernization (Delphi to Go), and process modeling.',
                'started_at' => '2025-01-01',
                'ended_at' => null,
            ],
            [
                'position' => 'Lecturer (Business Analytics & UML)',
                'company' => 'IT Top College',
                'description' => 'Delivered a comprehensive course on Business Analytics and UML modeling. Conducted lectures, practical sessions, and examinations.',
                'started_at' => '2024-09-01',
                'ended_at' => '2025-01-31',
            ],
            [
                'position' => 'Programmer technician, Process equipment adjuster',
                'company' => 'Polytechnic College of Sakhalin',
                'description' => 'State University «Programming in computer systems», full-time study. Graduated as a state-funded (budget) student and merit scholarship recipient.',
                'started_at' => '2020-09-01',
                'ended_at' => '2024-06-30',
            ],
        ];

        // 2. Достижения и обязанности для каждого места (Resume Works)
        $works = [
            0 => [ // IGS
                'Led a cross-functional team (3 programmers, 1 BA, interns): task assignment, code review, milestone management, and mentorship.',
                'Transitioned teams to YouTrack, established strict Git workflow/code review (GitLab), and introduced Docker for environment consistency.',
                'Developed International and Ground Transportation modules, automating routing, tracking, and warehouse integration.',
                'Currently building a Government Procurement (Tenders) Module to streamline public procurement processes.',
                'Spearheaded gradual migration of Delphi-based systems to Go, improving scalability without disrupting operations.',
                'Designed business process models using BPMN/DMN with Camunda and created technical documentation using Mermaid.',
                'Administered FireBird databases (IBExpert), successfully executing migration from version 3.0 to 5.0.',
            ],
            1 => [ // IT Top College
                'Delivered comprehensive courses on Business Analytics and UML modeling across 3 student groups.',
                'Conducted lectures, practical sessions, hands-on labs, assignments, and examinations.',
                'Result: 97% of students successfully passed their exams, demonstrating effective knowledge transfer.',
            ],
            2 => [ // College
                'Graduated as a state-funded (budget) student and merit scholarship recipient.',
                'Acquired foundational skills in programming and process equipment adjustment.',
            ],
        ];

        // Вставка Resumes и Resume Works
        foreach ($resumes as $index => $resumeData) {
            $resumeId = DB::table('resumes')->insertGetId([
                'position' => $resumeData['position'],
                'company' => $resumeData['company'],
                'started_at' => $resumeData['started_at'],
                'ended_at' => $resumeData['ended_at'],
                'description' => $resumeData['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $workItems = $works[$index] ?? [];
            foreach ($workItems as $workText) {
                DB::table('resume_works')->insert([
                    'resume_id' => $resumeId,
                    'text' => $workText,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // 3. Владелец резюме (Owner)
        Owner::insert([
            'name' => 'Vitalii Son',
            'position' => 'Lead Developer & Systems/Business Analyst',
        ]);

        // 4. Контакты (Contacts)
        Contact::insert([
            ['platform' => 'Email', 'link' => 'mailto:vitaliison.tech@gmail.com', 'text' => 'vitaliison.tech@gmail.com'],
            ['platform' => 'Phone', 'link' => 'tel:+79140912992', 'text' => '+7 914 091 29 92'],
            ['platform' => 'GitHub', 'link' => 'https://github.com/ImaSoGood', 'text' => 'github.com/ImaSoGood'],
            ['platform' => 'Location', 'link' => null, 'text' => 'Sakhalin, Russia'],
        ]);

        // 5. Технологический стек (Technologies)
        $techStack = [
            [
                'title' => 'Backend & Desktop',
                'description' => 'Core expertise in developing robust desktop and backend applications.',
                'items' => json_encode(['Go', 'C#', 'Delphi', 'PHP', 'Laravel']),
            ],
            [
                'title' => 'Databases',
                'description' => 'Designing, administering, and optimizing relational databases.',
                'items' => json_encode(['FireBird (IBExpert)', 'Red Database', 'PostgreSQL', 'MySQL/SQLite']),
            ],
            [
                'title' => 'DevOps & Tools',
                'description' => 'Ensuring environment consistency, version control, and process management.',
                'items' => json_encode(['Docker', 'Linux (Debian)', 'Git (GitLab/Git Extensions)', 'YouTrack']),
            ],
            [
                'title' => 'Modeling & Documentation',
                'description' => 'Visual modeling and notation design for clear stakeholder alignment.',
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

        // 6. Дополнительная информация (Work / Summary)
        $additionalInfo = [
            [
                'title' => 'Professional Summary',
                'text' => 'Backend developer with fast-learning and adapting skills. Experienced in developing databases and desktop software. Acquired Systems/Business Analyst competencies through hands-on experience. I take a systematic approach to problem-solving — from analysis and modeling to implementation, always considering business needs and user experience.'
            ],
            [
                'title' => 'Career Goals',
                'text' => 'Deepen technical expertise, develop management skills, and grow into a Tech Lead role. Driven by the opportunity to solve complex problems, see tangible outcomes, help users, and continuously learn.'
            ],
            [
                'title' => 'Languages & Interests',
                'text' => 'Languages: English (Fluent), Russian (Native). Interests: Snowboarding, building LEGO sets, chess, and billiards.'
            ],
        ];

        foreach ($additionalInfo as $info) {
            DB::table('work')->insert([
                'title' => $info['title'],
                'text' => $info['text'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}