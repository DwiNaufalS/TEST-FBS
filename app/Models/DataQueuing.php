<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DataQueuing extends Model
{
    use HasFactory;

    // Daftar kolom yang bisa diisi secara massal
    protected $fillable = [
        'no_polisi',
        'jenis_antrian',
        'customer_id',
        'waktu_pengambilan',
        'waktu_pemanggilan',
        'status',
        'nomor_antrian'
    ];

    // Menentukan apakah model menggunakan timestamps
    public $timestamps = true;

    // Relasi ke model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Format waktu_pengambilan agar ditampilkan dengan format yang diinginkan
    public function getFormattedWaktuPengambilanAttribute()
    {
        return Carbon::parse($this->waktu_pengambilan)->format('d-m-Y H:i:s');
    }

    // Format waktu_pemanggilan agar ditampilkan dengan format yang diinginkan
    public function getFormattedWaktuPemanggilanAttribute()
    {
        return Carbon::parse($this->waktu_pemanggilan)->format('d-m-Y H:i:s');
    }

    // Metode untuk mendapatkan antrean berdasarkan jenis
    public static function getQueueByType($jenisAntrian)
    {
        return self::where('jenis_antrian', $jenisAntrian)->get();
    }
}
