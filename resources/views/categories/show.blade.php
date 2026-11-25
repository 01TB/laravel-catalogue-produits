@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header" style="background-color: {{ $category->color }}; color: white;">
                    <h2 class="mb-0">{{ $category->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5>Informations</h5>
                            <dl class="row">
                                <dt class="col-sm-4">ID:</dt>
                                <dd class="col-sm-8">{{ $category->id }}</dd>

                                <dt class="col-sm-4">Slug:</dt>
                                <dd class="col-sm-8"><code>{{ $category->slug }}</code></dd>

                                <dt class="col-sm-4">Couleur:</dt>
                                <dd class="col-sm-8">
                                    <span class="badge" style="background-color: {{ $category->color }}; padding: 8px 12px;">
                                        {{ $category->color }}
                                    </span>
                                </dd>

                                <dt class="col-sm-4">Statut:</dt>
                                <dd class="col-sm-8">
                                    @if ($category->is_active)
                                        <span class="badge bg-success">Actif</span>
                                    @else
                                        <span class="badge bg-secondary">Inactif</span>
                                    @endif
                                </dd>

                                <dt class="col-sm-4">Créé:</dt>
                                <dd class="col-sm-8">{{ $category->created_at->format('d/m/Y H:i') }}</dd>

                                <dt class="col-sm-4">Modifié:</dt>
                                <dd class="col-sm-8">{{ $category->updated_at->format('d/m/Y H:i') }}</dd>
                            </dl>
                        </div>
                    </div>

                    @if ($category->description)
                        <div class="mb-4">
                            <h5>Description</h5>
                            <p class="text-muted">{{ $category->description }}</p>
                        </div>
                    @endif

                    <div class="d-flex gap-2">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Éditer
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </form>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
