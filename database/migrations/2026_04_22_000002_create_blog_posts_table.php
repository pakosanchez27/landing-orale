<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 180);
            $table->string('slug', 180)->unique();
            $table->string('category', 120);
            $table->string('excerpt', 260);
            $table->string('cover_image');
            $table->longText('content_html');
            $table->string('reading_time', 50);
            $table->date('published_at');
            $table->unsignedTinyInteger('is_active')->default(1);
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->nullable()->useCurrentOnUpdate();
        });

        DB::table('blog_posts')->insert([
            [
                'title' => 'Como mejorar la UX de tu sitio web en 30 dias',
                'slug' => 'como-mejorar-la-ux-de-tu-sitio-web-en-30-dias',
                'category' => 'UX',
                'excerpt' => 'Un plan practico para optimizar navegacion, velocidad y conversiones sin rehacerlo todo desde cero.',
                'cover_image' => 'img/blog-principal.png',
                'content_html' => '<p>Mejorar la experiencia de usuario no siempre exige rehacer un sitio completo. A menudo, los avances mas importantes aparecen cuando ordenas mejor la jerarquia visual, aclaras el recorrido y reduces la friccion en puntos clave.</p><p>El primer paso es revisar si tu home responde rapido tres preguntas: que haces, para quien lo haces y que debe hacer el usuario despues. Si esas respuestas no estan claras en los primeros segundos, el sitio pierde fuerza comercial.</p><h2>Un checklist simple para empezar</h2><ul><li>Haz que el encabezado principal explique valor real, no solo una frase bonita.</li><li>Reduce ruido visual y deja un camino evidente hacia la accion principal.</li><li>Optimiza imagenes, espaciado y contraste para mejorar legibilidad.</li><li>Revisa el formulario: menos friccion casi siempre significa mas conversiones.</li></ul><p>Cuando un sitio se siente ordenado, fluido y consistente, la marca se percibe mas seria. Y esa percepcion tiene un impacto directo en la confianza del usuario y en la capacidad de generar prospectos.</p>',
                'reading_time' => '5 minutos',
                'published_at' => '2026-03-03',
                'is_active' => 1,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'title' => 'Guia para migrar tu web sin perder posicionamiento',
                'slug' => 'guia-para-migrar-tu-web-sin-perder-posicionamiento',
                'category' => 'SEO tecnico',
                'excerpt' => 'Puntos clave para cuidar URLs, rendimiento y estructura al modernizar un sitio existente.',
                'cover_image' => 'img/blog1.png',
                'content_html' => '<p>Migrar una web requiere orden tecnico y criterio. Lo importante es mantener estructura, redirecciones y activos clave para no perder traccion.</p><p>Antes de mover nada conviene auditar URLs, metadatos y enlaces internos. Luego, planear redirecciones y validar performance despues del lanzamiento.</p>',
                'reading_time' => '4 minutos',
                'published_at' => '2026-02-27',
                'is_active' => 1,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
            [
                'title' => 'Que debe incluir una landing page para vender mas',
                'slug' => 'que-debe-incluir-una-landing-page-para-vender-mas',
                'category' => 'Conversion',
                'excerpt' => 'Jerarquia visual, prueba social y llamadas a la accion que empujan resultados reales.',
                'cover_image' => 'img/blog2.png',
                'content_html' => '<p>Una landing eficaz necesita una propuesta de valor clara, prueba social y un CTA dominante. Todo lo que no ayude a eso agrega friccion.</p><p>Tambien influye la secuencia: problema, solucion, evidencia y accion. Cuando ese orden esta bien resuelto, la conversion mejora.</p>',
                'reading_time' => '4 minutos',
                'published_at' => '2026-02-18',
                'is_active' => 1,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
