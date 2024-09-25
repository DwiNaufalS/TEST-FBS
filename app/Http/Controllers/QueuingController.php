<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\DataQueuing;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class QueuingController extends Controller
{
    public function showTicketForm()
    {
        return view('queuing.ticket-form'); 
    }

    public function checkNoPolisi(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required|string|max:255',
            'jenis_antrian' => 'required|string|in:GR,BP',
        ]);

        $noPolisi = $request->input('no_polisi');
        $customer = Customer::where('no_polisi', $noPolisi)->first();

        if ($customer) {
            return $this->createQueue($noPolisi, $request->input('jenis_antrian'), $customer->id);
        } else {
            return view('queuing.new-customer', [
                'noPolisi' => $noPolisi,
                'jenis_antrian' => $request->input('jenis_antrian'),
            ]);
        }
    }

    public function storeNewCustomer(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'jenis_antrian' => 'required|string|in:GR,BP',
        ]);

        $customer = Customer::create($request->only(['no_polisi', 'nama', 'alamat', 'no_hp']));

        return $this->createQueue($request->input('no_polisi'), $request->input('jenis_antrian'), $customer->id);
    }

    private function createQueue($noPolisi, $jenisAntrian, $customerId)
    {
        $queue = DataQueuing::create([
            'no_polisi' => $noPolisi,
            'jenis_antrian' => $jenisAntrian,
            'customer_id' => $customerId,
            'waktu_pengambilan' => Carbon::now(),
            'status' => 'waiting',
            'nomor_antrian' => DataQueuing::where('jenis_antrian', $jenisAntrian)->max('nomor_antrian') + 1,
        ]);

        Alert::success('Berhasil', 'Tiket Anda berhasil diambil!');

        return redirect()->route('queuing.success', ['queueId' => $queue->id]);
    }

    public function showSuccessPage($queueId)
    {
        $queue = DataQueuing::findOrFail($queueId);

        Alert::success('Berhasil', 'Tiket Anda berhasil diambil!');
        return view('queuing.success', compact('queue'));
    }
}
