<?php
    namespace App\Http\Controllers\API;

    use Illuminate\Http\Request;
    use App\Http\Controllers\API\BaseController as BaseController;
    use Illuminate\Support\Facades\Validator;
    use App\Models\Wisata;
    use App\Http\Resources\Wisata as WisataResource;

    class WisataController extends BaseController
    {
        public function index()
        {
            $wisata = Wisata::all();
            return $this->sendResponse(WisataResource::collection($wisata), 'Data Wisata Berhasil Ditampilkan');
        }

        public function store(Request $request)
        {
            $input = $request->all();
            $validator = Validator::make($input,[
                'nama' =>'required',
                'gambar' => 'required',
                'harga_masuk' =>'required',
                'deskripsi' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError($validator->errors());
            }
            $wisata = Wisata::create($input);
            return $this->sendResponse(new WisataResource($wisata), 'Data Wisata ditambahkan');
        }

        public function show($id)
        {
            $mahasiswa = Wisata::find($id);
            if (is_null($mahasiswa)) {
                return $this->sendError('Data does not exist.');
            }
            return $this->sendResponse(new WisataResource($mahasiswa), 'Data ditampilkan');
        }

        public function update(Request $request, $id)
        {

            $input = $request->all();

            $validator = Validator::make($input, [
                'nama' => 'required',
                'gambar' => 'required',
                'harga_masuk' => 'required',
                'deskripsi' => 'required',
            ]);

            if($validator->fails()){
                return $this->sendError($validator->errors());
            }

            $wisata = Wisata::find($id);
            $wisata->nama = $input['nama'];
            $wisata->gambar = $input['gambar'];
            $wisata->harga_masuk = $input['harga_masuk'];
            $wisata->deskripsi = $input['deskripsi'];
            $wisata->save();

            return $this->sendResponse(new WisataResource($wisata), 'Data berhasil diubah.');
        }

        public function destroy($id)
        {
            $wisata = Wisata::find($id);
            $wisata->delete();
            if (is_null($wisata)) {
                return $this->sendError('Data does not exist.');
            }
            return $this->sendResponse(new WisataResource($wisata), 'Data dihapus');
        }
    }

?>