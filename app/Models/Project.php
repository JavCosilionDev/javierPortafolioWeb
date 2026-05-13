<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Project Model
 *
 * Representa un proyecto en el portafolio del desarrollador.
 * Los proyectos se almacenan en PostgreSQL y se muestran
 * con diferentes plantillas segun su tipo y categoria.
 *
 * @property int         $id
 * @property string      $title_es       Titulo en espanol
 * @property string      $title_en       Titulo en ingles
 * @property string      $description_es Descripcion en espanol
 * @property string      $description_en Descripcion en ingles
 * @property string      $type           Tipo: 'featured' | 'card' | 'timeline'
 * @property string      $category       Categoria: 'web' | 'mobile' | 'backend' | 'erp'
 * @property array       $technologies   Lista de tecnologias usadas (JSON)
 * @property string|null $url            URL del proyecto (si esta disponible)
 * @property string|null $github_url     URL del repositorio en GitHub
 * @property string|null $image          Ruta de la imagen del proyecto
 * @property string      $status_es      Estado en espanol: 'Produccion', 'Desarrollo', etc.
 * @property string      $status_en      Estado en ingles: 'Production', 'Development', etc.
 * @property int         $order          Orden de aparicion en la lista
 * @property string      $period         Periodo del proyecto (ej: '2024 - Presente')
 * @property string      $company        Empresa o contexto del proyecto
 */
class Project extends Model
{
    use HasFactory;

    /**
     * La tabla de base de datos asociada al modelo.
     * En PostgreSQL, las tablas usan snake_case en plural.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * Campos que se pueden asignar masivamente.
     * Protege contra ataques de asignacion masiva.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title_es',
        'title_en',
        'description_es',
        'description_en',
        'type',
        'category',
        'technologies',
        'url',
        'github_url',
        'image',
        'status_es',
        'status_en',
        'order',
        'period',
        'company',
    ];

    /**
     * Conversion automatica de tipos de datos.
     * El campo 'technologies' se almacena como JSON en PostgreSQL.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'technologies' => 'array',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
    ];

    /**
     * Scope para filtrar proyectos por categoria.
     * Uso: Project::ofCategory('web')->get()
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope para obtener proyectos de tipo 'featured' (destacados).
     * Los proyectos destacados tienen una plantilla visual diferente.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('type', 'featured');
    }
}
