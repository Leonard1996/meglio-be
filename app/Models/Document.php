<?php

namespace App\Models;

use App\Helpers\FileUploader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type_id',
        'signable_document',
        'signed_document_path',
        'unsigned_document_path',
        'sign_request_id',
        'doc_request_id',
        'upload_in_cloud'
    ];

    /**
     *
     * Custom attributes
     *
     * @var array
     */
    protected $appends = [
        'unsigned_document_link',
        'unsigned_document_name',
        'signed_document_link',
        'signed_document_name'
    ];

    /**
     * Get unsigned document link
     *
     * @return Attribute
     */
    protected function unsignedDocumentLink(): Attribute
    {
        $path = "documents";

        return new Attribute(
            get: fn() => $this->retriveFile($this->unsigned_document_path, $path),
        );
    }

    /**
     * Get unsigned document name
     *
     * @return Attribute
     */
    protected function unsignedDocumentName(): Attribute
    {
        // $name = explode('.', $this->unsigned_document_path);

        return new Attribute(
            get: fn() => "$this->unsigned_document_path",
        );
    }

    /**
     * Get unsigned document link
     *
     * @return Attribute
     */
    protected function signedDocumentLink(): Attribute
    {
        $path = "documents/signed";

        return new Attribute(
            get: fn() => $this->signed_document_path ? $this->retriveFile($this->signed_document_path, $path) : null,
        );
    }

    /**
     * Get unsigned document name
     *
     * @return Attribute
     */
    protected function signedDocumentName(): Attribute
    {
        // $name = $this->signed_document_path ? explode('.', $this->signed_document_path) : null;

        return new Attribute(
            get: fn() => $this->signed_document_path ? "$this->signed_document_path" : null,
        );
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document_type()
    {
        return $this->belongsTo(DocumentType::class);
    }


    /**
     * Retrive file path from local storage
     * @param resource $file
     * @param string $filePath
     * @return string
     */
    public function retriveFile($file, $filePath)
    {
        $url = ($this->upload_in_cloud == 0)
            ?  '/storage/' . $filePath
            : "amazon url" . $filePath;

        return $url . '/' . $file;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function insurance_request_document():HasOne {
        return $this->hasOne(InsuranceRequestDocument::class);
    }
}
