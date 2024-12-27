<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PengaduanController extends Controller
{
    // Simpan Pengaduan dari Form
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'alasan' => 'required',
        ]);

        Pengaduan::create([
            'email' => $request->email,
            'alasan' => $request->alasan,
        ]);

        return back()->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'balasan' => $request->balasan,
            'status' => 'dibalas',
        ]);

        // Kirim email dengan template
        Mail::send('emails.pengaduan_reply', [
            'alasan' => $pengaduan->alasan,
            'balasan' => $request->balasan,
        ], function ($message) use ($pengaduan) {
            $message->to($pengaduan->email)
                ->subject('Balasan Pengaduan Anda');
        });

        return back()->with('success', 'Balasan berhasil dikirim dan email telah dikirimkan.');
    }
}
