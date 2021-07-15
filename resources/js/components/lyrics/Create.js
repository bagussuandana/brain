import axios from 'axios';
import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';

function Create(props) {
    const [message, setMessage] = useState('')
    const [bands, setBands] = useState([])
    const [albums, setAlbums] = useState([])
    const [bandId, setBandId] = useState('')
    const [albumId, setAlbumId] = useState('')
    const [title, setTitle] = useState('')
    const [body, setBody] = useState('')
    const [errors, setErrors] = useState([])
    const request = {
        band: bandId,
        album: albumId,
        title,
        body,

    }
    const getBands = async () => {
        let response = await axios.get('/bands/table')
        setBands(response.data);
    }
    const getAlbumBySelectedBand = async (e) => {
        setBandId(e.target.value)
        let response = await axios.get(`/albums/get-album-by-${e.target.value}`)
        setAlbums(response.data);
    }
    const store =  async (e) => {
        e.preventDefault();
        try {
            let response = await axios.post(props.endpoint, request)
            setMessage(response.data.message);
            setErrors([]);
            setBandId('');
            setAlbumId('');
            setTitle('');
            setBody('');
        } catch (e) {
            setErrors(e.response.data.errors);
        }


    }
    useEffect(() => {
        getBands()
    }, []);
    return (
        <>
            {message && <div className="alert alert-success" role="alert">{ message }</div>}
            <div className="card">
                <div className="card-header">{props.title}</div>
                <div className="card-body">
                    <form onSubmit={store}>
                        <div className="form-group">
                            <label htmlFor="band">Band</label>
                            <select value={bandId} onChange={getAlbumBySelectedBand} name="band" id="band" className="form-control">
                                <option value={null}>Choose One</option>
                                {
                                    bands.map((band) => {
                                        return <option key={band.id} value={band.id}>{ band.name}</option>
                                    })
                                }
                            </select>
                            {errors.band ?
                                <div className="text-danger mt-2">{errors.band[0]}</div>
                                : ''
                            }
                        </div>
                        {
                            albums.length ?
                        <div className="form-group">
                            <label htmlFor="album">Albums</label>
                            <select value={albumId} name="album" id="album" className="form-control" onChange={(e) => setAlbumId(e.target.value)}>
                                <option value={null}>Choose Album</option>
                                {
                                    albums.map((album) => {
                                        return <option key={album.id} value={album.id}>{ album.name}</option>
                                    })
                                }
                                    </select>
                                    {errors.album?
                                        <div className="text-danger mt-2">{errors.album[0]}</div>
                                        : ''
                                    }
                        </div> : ''
                        }
                        <div className="form-group">
                            <label htmlFor="title">Title</label>
                            <input type="text" value={title} onChange={(e) => setTitle(e.target.value)} name="title" id="title" className="form-control" />
                            {errors.title?
                                <div className="text-danger mt-2">{errors.title[0]}</div>
                                : ''
                            }
                        </div>
                        <div className="form-group">
                            <label htmlFor="body">Lyric</label>
                            <textarea type="text" rows="10" value={body} onChange={(e) => setBody(e.target.value)} name="body" id="body" className="form-control" />
                            {errors.body?
                                <div className="text-danger mt-2">{errors.body[0]}</div>
                                : ''
                            }
                        </div>
                        <button type="submit" className="btn btn-primary">Create</button>
                    </form>
                </div>
         </div>
        </>
    );
}

export default Create;

if (document.getElementById('create-lyric')) {
    var item = document.getElementById('create-lyric')
    ReactDOM.render(<Create endpoint={item.getAttribute('endpoint')} title={item.getAttribute('title')} />, item);
}
