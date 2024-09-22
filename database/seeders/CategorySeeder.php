<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryQuestionnaire;
use App\Models\Questionnaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Teknik Komputer Jaringan',
                'description' => 'Teknik Komputer Jaringan',
            ],
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'description' => 'Rekayasa Perangkat Lunak',
            ],
            [
                'name' => 'Multimedia',
                'description' => 'Multimedia',
            ],
            [
                'name' => 'Other',
                'description' => 'Other',
            ]
        ];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'description' => $category['description'],
            ]);
        }

        $questionnaires = [
            [
                'description' => 'Apa yang paling menarik bagi Anda dalam menggunakan komputer?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 1,
                        'description' => 'Membuat dan mengembangkan perangkat lunak',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 1,
                        'description' => 'Merancang dan membangun jaringan komputer',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 1,
                        'description' => 'Membuat desain grafis dan animasi',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 1,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
            [
                'description' => 'Jika Anda diminta untuk mengerjakan proyek, mana yang lebih Anda sukai?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 2,
                        'description' => 'Membuat aplikasi mobile atau website',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 2,
                        'description' => 'Mengonfigurasi router dan switch',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 2,
                        'description' => 'Mengedit video dan membuat efek visual',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 2,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
            [
                'description' => 'Apa yang ingin Anda pelajari lebih dalam tentang teknologi?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 3,
                        'description' => 'Bahasa pemrograman dan algoritma',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 3,
                        'description' => 'Protokol jaringan dan keamanan sistem',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 3,
                        'description' => 'Teknik fotografi dan pengolahan gambar',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 3,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
            [
                'description' => 'Dalam tim proyek, peran apa yang paling Anda minati?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 4,
                        'description' => 'Menganalisis dan merancang sistem',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 4,
                        'description' => 'Mengelola infrastruktur IT',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 4,
                        'description' => 'Merancang antarmuka pengguna',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 4,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
            [
                'description' => 'Apa yang paling menarik perhatian Anda saat menggunakan smartphone?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 5,
                        'description' => 'Berbagai aplikasi yang tersedia',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 5,
                        'description' => 'Kecepatan koneksi internet',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 5,
                        'description' => 'Tampilan dan animasi pada interface',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 5,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
            [
                'description' => 'Jika Anda bisa magang di perusahaan teknologi, bidang apa yang Anda pilih?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 6,
                        'description' => 'Pengembangan software',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 6,
                        'description' => 'Administrasi jaringan',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 6,
                        'description' => 'Desain grafis dan produksi konten',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 6,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
            [
                'description' => 'Apa yang paling Anda nikmati saat menggunakan internet?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 7,
                        'description' => 'Mengeksplorasi berbagai website dan aplikasi',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 7,
                        'description' => 'Mempelajari cara kerja internet',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 7,
                        'description' => 'Menikmati konten visual seperti video dan gambar',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 7,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
            [
                'description' => 'Jika Anda bisa membuat proyek sendiri, apa yang akan Anda buat?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 8,
                        'description' => 'Aplikasi untuk memecahkan masalah sehari-hari',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 8,
                        'description' => 'Sistem keamanan jaringan',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 8,
                        'description' => 'Film pendek atau animasi',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 8,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
            [
                'description' => 'Apa yang paling menarik bagi Anda dalam perkembangan teknologi saat ini?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 9,
                        'description' => 'Kecerdasan Buatan (AI) dan Machine Learning',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 9,
                        'description' => 'Internet of Things (IoT)',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 9,
                        'description' => 'Augmented Reality (AR) dan Virtual Reality (VR)',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 9,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
            [
                'description' => 'Jika Anda bisa memilih satu keterampilan untuk dikuasai, apa yang Anda pilih?',
                'status' => 'active',
                'categoryQuestionnaires' => [
                    [
                        'category_id' => 1,
                        'questionnaire_id' => 10,
                        'description' => 'Membuat aplikasi dari awal hingga akhir',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 2,
                        'questionnaire_id' => 10,
                        'description' => 'Troubleshooting masalah jaringan',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 3,
                        'questionnaire_id' => 10,
                        'description' => 'Menguasai software editing video dan gambar',
                        'status' => 'active',
                        'score' => 1
                    ],
                    [
                        'category_id' => 4,
                        'questionnaire_id' => 10,
                        'description' => 'Other',
                        'status' => 'active',
                        'score' => 1
                    ],
                ]
            ],
        ];

        foreach ($questionnaires as $questionnaireData) {
            $categoryQuestionnaires = $questionnaireData['categoryQuestionnaires'];
            unset($questionnaireData['categoryQuestionnaires']);

            $questionnaire = Questionnaire::create($questionnaireData);

            foreach ($categoryQuestionnaires as $categoryQuestionnaireData) {
                CategoryQuestionnaire::create([
                    'category_id' => $categoryQuestionnaireData['category_id'],
                    'questionnaire_id' => $questionnaire->id,
                    'description' => $categoryQuestionnaireData['description'],
                    'status' => $categoryQuestionnaireData['status'],
                    'score' => $categoryQuestionnaireData['score'],
                ]);
            }
        }
    }
}