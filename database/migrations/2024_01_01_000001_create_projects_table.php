<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: create_projects_table
 *
 * Crea la tabla 'projects' en PostgreSQL para almacenar
 * los proyectos del portafolio del desarrollador.
 *
 * La tabla incluye soporte bilingue (es/en) para todos los
 * campos de texto que se muestran al usuario.
 * Las tecnologias se almacenan como JSONB para eficiencia en PostgreSQL.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migracion. Crea la tabla 'projects'.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            // Clave primaria autoincremental
            $table->id();

            // Titulo del proyecto en ambos idiomas
            $table->string('title_es', 200);
            $table->string('title_en', 200);

            // Descripcion detallada del proyecto en ambos idiomas
            $table->text('description_es');
            $table->text('description_en');

            // Tipo de plantilla visual: 'featured' | 'card' | 'timeline'
            // featured: tarjeta grande destacada
            // card: tarjeta normal en grid
            // timeline: vista de linea de tiempo
            $table->string('type', 20)->default('card');

            // Categoria del proyecto para filtrado
            // Valores posibles: 'web' | 'mobile' | 'backend' | 'erp' | 'personal'
            $table->string('category', 50);

            // Array JSON de tecnologias usadas en el proyecto
            // Se usa JSONB en PostgreSQL para mejor performance en consultas
            $table->jsonb('technologies')->default('[]');

            // URLs opcionales del proyecto
            $table->string('url', 500)->nullable();
            $table->string('github_url', 500)->nullable();

            // Ruta de la imagen del proyecto (relativa a /public/images/)
            $table->string('image', 500)->nullable();

            // Estado del proyecto en ambos idiomas
            $table->string('status_es', 50)->default('Produccion');
            $table->string('status_en', 50)->default('Production');

            // Orden de aparicion en la lista (menor numero = primero)
            $table->unsignedSmallInteger('order')->default(0);

            // Periodo de tiempo del proyecto (ej: 'Feb 2025 - Presente')
            $table->string('period', 100)->nullable();

            // Empresa o contexto del proyecto
            $table->string('company', 200)->nullable();

            // Timestamps automaticos de Laravel (created_at, updated_at)
            $table->timestamps();

            // Indice en 'category' para filtrado eficiente
            $table->index('category');

            // Indice en 'order' para ordenamiento eficiente
            $table->index('order');
        });
    }

    /**
     * Revierte la migracion. Elimina la tabla 'projects'.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
