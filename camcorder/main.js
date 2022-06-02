"use strict";
/*! VERSION | 10.33.25 */
(self.webpackChunk_stripchat_app = self.webpackChunk_stripchat_app || []).push([[427], {
    49776: function(J, F, n) {
        n.d(F, {
            K: function() {
                return G
            }
        });
        var b = n(83319)
          , y = n.n(b)
          , N = n(40623)
          , v = n.n(N)
          , Z = n(22899)
          , K = n(67059)
          , V = n(57204)
          , j = n(5251);
        function L(l, d) {
            var s = Object.keys(l);
            if (Object.getOwnPropertySymbols) {
                var t = Object.getOwnPropertySymbols(l);
                d && (t = t.filter(function(B) {
                    return Object.getOwnPropertyDescriptor(l, B).enumerable
                })),
                s.push.apply(s, t)
            }
            return s
        }
        function M(l) {
            for (var d = 1; d < arguments.length; d++) {
                var s = arguments[d] != null ? arguments[d] : {};
                d % 2 ? L(Object(s), !0).forEach(function(t) {
                    W(l, t, s[t])
                }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(l, Object.getOwnPropertyDescriptors(s)) : L(Object(s)).forEach(function(t) {
                    Object.defineProperty(l, t, Object.getOwnPropertyDescriptor(s, t))
                })
            }
            return l
        }
        function W(l, d, s) {
            return d in l ? Object.defineProperty(l, d, {
                value: s,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : l[d] = s,
            l
        }
        const H = {
            videoProfile: j.xA.HIGH,
            videoDeviceId: "",
            audioDeviceId: "",
            facingMode: V.pT.USER
        }
          , G = (l,d)=>{
            const s = M({}, H);
            if (!v()(d, H.videoProfile || "")) {
                const w = y()(d, (c,u,g)=>u.bitrate > d[c].bitrate ? g : c, Object.keys(d)[0]);
                s.videoProfile = w
            }
            if (l)
                return s;
            const t = K.Z.get(Z.Hx, s);
            if (!t)
                return s;
            const {videoProfile: B} = t;
            return v()(d, B) || (t.videoProfile = s.videoProfile),
            t
        }
    },
    70910: function(J, F, n) {
        n.d(F, {
            TA: function() {
                return q
            }
        });
        var b = n(95863)
          , y = n.n(b)
          , N = n(22765)
          , v = n.n(N)
          , Z = n(3859)
          , K = n.n(Z)
          , V = n(83319)
          , j = n.n(V)
          , L = n(12276)
          , M = n.n(L)
          , W = n(2509)
          , H = n.n(W)
          , G = n(94949)
          , l = n(26736)
          , d = n(36257)
          , s = n(57204)
          , t = n(50216)
          , B = n(4987)
          , w = n(85859)
          , c = n(5251)
          , u = n(84985)
          , g = n(42454);
        function Y(o, i) {
            var a = Object.keys(o);
            if (Object.getOwnPropertySymbols) {
                var e = Object.getOwnPropertySymbols(o);
                i && (e = e.filter(function(r) {
                    return Object.getOwnPropertyDescriptor(o, r).enumerable
                })),
                a.push.apply(a, e)
            }
            return a
        }
        function O(o) {
            for (var i = 1; i < arguments.length; i++) {
                var a = arguments[i] != null ? arguments[i] : {};
                i % 2 ? Y(Object(a), !0).forEach(function(e) {
                    f(o, e, a[e])
                }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(o, Object.getOwnPropertyDescriptors(a)) : Y(Object(a)).forEach(function(e) {
                    Object.defineProperty(o, e, Object.getOwnPropertyDescriptor(a, e))
                })
            }
            return o
        }
        function f(o, i, a) {
            return i in o ? Object.defineProperty(o, i, {
                value: a,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : o[i] = a,
            o
        }
        const h = 1e3
          , p = 300
          , R = 1e3
          , _ = 5
          , E = 300
          , P = 2e4
          , U = ["server", "streamName", "streamUrl", "transport", "role", "stream", "videoProfile", "webRTCAppKey", "mediaConfig"]
          , S = {
            server: (o,i)=>o !== i,
            streamName: (o,i)=>o !== i,
            streamUrl: (o,i)=>o !== i,
            transport: (o,i)=>o !== i,
            role: ()=>!1,
            webRTCAppKey: ()=>!1,
            mediaConfig: ()=>!1,
            stream: (o,i)=>(o == null ? void 0 : o.id) !== (i == null ? void 0 : i.id),
            videoProfile: (o,i)=>o !== i
        }
          , m = (o,i)=>j()(U, (a,e)=>((!S[e] || S[e](o == null ? void 0 : o[e], i == null ? void 0 : i[e])) && (a[e] = !0),
        a), {})
          , I = (o,i)=>{
            const a = m(o, i);
            return K()(a)
        }
          , k = (o,i)=>{
            const a = m(o, i)
              , e = v()(a);
            return Boolean(e.length === 1 && a.stream)
        }
          , x = o=>{
            if (!o)
                return !1;
            const {streamName: i, stream: a, streamUrl: e} = o;
            return Boolean(i && a && e)
        }
          , Q = o=>[O(O({}, s.LJ), o)]
          , $ = ()=>{
            const o = ()=>Math.floor((1 + Math.random()) * 65536).toString(16).substring(1);
            return "".concat(o()).concat(o(), "-").concat(o(), "-").concat(o(), "-").concat(o(), "-").concat(o()).concat(o())
        }
          , z = 20;
        class q extends W.EventEmitter {
            constructor(i) {
                var a;
                super();
                a = this,
                this.countFailedConnection = 0,
                this.status = c.eM.NEW,
                this.sessionId = null,
                this.config = null,
                this.resolutions = void 0,
                this.socketConnection = void 0,
                this.peerConnection = null,
                this.generateSessionId = e=>(t.Z.info("FlashphonerWebRTCBroadcastConnection.generateSessionId()"),
                "".concat(e, "_").concat($())),
                this.updateStatus = e=>{
                    t.Z.info("FlashphonerWebRTCBroadcastConnection.updateStatus", e),
                    e === c.eM.FAILED ? this.countFailedConnection += 1 : this.countFailedConnection = 0,
                    this.status = e
                }
                ,
                this.getIsStatusFailed = ()=>this.status === c.eM.FAILED,
                this.getIsStatusComplited = ()=>this.status === c.eM.COMPLETED,
                this.onSocketMessage = e=>{
                    const {message: r} = e;
                    switch (t.Z.info("FlashphonerWebRTCBroadcastConnection.onSocketMessage()", r),
                    r) {
                    case s.mI.PING:
                        {
                            this.socketConnection.send({
                                message: s.mI.PONG,
                                data: []
                            });
                            break
                        }
                    case s.mI.INBOUND_VIDEO_RATE:
                        {
                            const {data: C} = e
                              , [D] = C;
                            if (u.Z.getMeasurementCalculatedCount() <= z) {
                                const T = y()(D, ["fps", "lostPackets", "nack", "pli"]);
                                if (u.Z.updateMeasurementCalculated("quality", T),
                                u.Z.getMeasurementCalculatedCount() === z) {
                                    const A = u.Z.getMeasurement();
                                    this.emit(c.t2.MEASUREMENT, A)
                                }
                            }
                            this.emit(c.t2.UPDATE_VIDEO_QUALITY, D);
                            break
                        }
                    case s.mI.GET_USER_DATA:
                        {
                            u.Z.updateMeasurement("connectionServer"),
                            this.updateLogConnection({
                                message: "Get user data"
                            }),
                            this.updatedBroadcastConnection(this.sessionId);
                            break
                        }
                    case s.mI.SET_REMOTE_SDP:
                        {
                            const {data: C} = e
                              , [D] = C;
                            if (this.sessionId !== D) {
                                t.Z.warn("FlashphonerWebRTCBroadcastConnection.onSocketMessage() set remote sdp after stream stop");
                                return
                            }
                            this.updateLogConnection({
                                message: "Set remote sdp"
                            }),
                            this.setRemoteOffer(e);
                            break
                        }
                    case s.mI.NOTIFY_STREAM_STATUS_EVENT:
                        {
                            const {data: [{status: C, mediaSessionId: D}]} = e;
                            if (this.sessionId !== D) {
                                t.Z.warn("FlashphonerWebRTCBroadcastConnection.onSocketMessage() update stream status for other connection");
                                return
                            }
                            if (C === s.$Z.UNPUBLISHED) {
                                const {data: [T]} = e;
                                this.config && (this.updateLogConnection({
                                    message: "Success unpublishing",
                                    data: T
                                }),
                                this.updateSession())
                            }
                            if (C === s.$Z.PUBLISHING) {
                                const {data: [T]} = e;
                                this.getIsStatusFailed() ? this.updateLogConnection({
                                    message: "Success publishing after reload connection",
                                    data: T
                                }) : this.updateLogConnection({
                                    message: "Success publishing",
                                    data: T
                                }),
                                this.updatedBroadcasting()
                            }
                            if (C === s.$Z.FAILED) {
                                const {data: [T]} = e;
                                this.updateFailedConnection({
                                    message: "Error flashphoner message",
                                    data: T
                                })
                            }
                            break
                        }
                    default:
                        break
                    }
                }
                ,
                this.initBroadcast = async()=>(t.Z.info("FlashphonerWebRTCBroadcastConnection.initBroadcast()", this.config),
                this.emit(c.t2.INIT_BROADCASTING),
                null),
                this.createOffer = async()=>{
                    if (t.Z.info("FlashphonerWebRTCBroadcastConnection.createOffer()"),
                    !this.peerConnection)
                        return Promise.reject();
                    if (c.uY)
                        return this.peerConnection.createOffer();
                    const e = {
                        offerToReceiveVideo: !1,
                        offerToReceiveAudio: !1,
                        voiceActivityDetection: !1,
                        iceRestart: !0
                    };
                    return this.peerConnection.createOffer(e)
                }
                ,
                this.setOffer = async e=>{
                    var r;
                    if (!this.peerConnection)
                        return Promise.reject();
                    const {videoProfile: C} = this.config
                      , {bitrate: D=h} = ((r = this.resolutions) == null ? void 0 : r[C]) || {}
                      , A = new w.Z(e).addBitrates(D).addStereo().getDescription();
                    return t.Z.info("FlashphonerWebRTCBroadcastConnection.setOffer()", {
                        modifiedSdp: A
                    }),
                    this.peerConnection.setLocalDescription(A).then(()=>A)
                }
                ,
                this.sendOffer = e=>{
                    var r;
                    if (t.Z.info("FlashphonerWebRTCBroadcastConnection.sendOffer()", {
                        sdp: e
                    }),
                    !this.config)
                        return;
                    const {videoProfile: C, streamName: D, transport: T, broadcastToken: A, userId: ee} = this.config
                      , {bitrate: X=h} = ((r = this.resolutions) == null ? void 0 : r[C]) || {}
                      , te = {
                        video: {
                            minBitrate: X ? X - c.Sb : 0,
                            maxBitrate: X ? X + c.Sb : 0
                        }
                    };
                    this.socketConnection.send({
                        message: s.mI.PUBLISH_STREAM,
                        data: Q({
                            custom: {
                                token: A,
                                userId: ee
                            },
                            mediaSessionId: this.sessionId,
                            name: D,
                            sdp: e.sdp,
                            constraints: te,
                            transport: T
                        })
                    })
                }
                ,
                this.setRemoteOffer = e=>{
                    const {data: r} = e;
                    if (!this.peerConnection)
                        return;
                    t.Z.info("FlashphonerWebRTCBroadcastConnection.setRemoteOffer()", {
                        data: r
                    });
                    const [,C] = r;
                    this.peerConnection.setRemoteDescription({
                        sdp: C,
                        type: "answer"
                    })
                }
                ,
                this.resumeBroadcastConnection = ()=>{
                    const {config: e} = this;
                    return e ? (this.updateLogConnection({
                        message: "Resume connection"
                    }),
                    this.sessionId = this.generateSessionId(e.streamName),
                    this.updatedBroadcastConnection(this.sessionId)) : (t.Z.warn("FlashphonerWebRTCBroadcastConnection.resumeBroadcastConnection() error"),
                    null)
                }
                ,
                this.updatedBroadcastConnection = async e=>{
                    try {
                        u.Z.updateMeasurement("connectionStream");
                        const r = await this.createOffer();
                        if (this.sessionId === e) {
                            const C = await this.setOffer(r);
                            await this.sendOffer(C)
                        }
                    } catch (r) {
                        t.Z.warn("FlashphonerWebRTCBroadcastConnection.updatedBroadcastConnection()", r),
                        this.sessionId === e && (this.updateLogConnection({
                            message: "Error update broadcast connection"
                        }),
                        this.failedConnection(r))
                    }
                    return null
                }
                ,
                this.updatedBroadcasting = ()=>{
                    t.Z.info("FlashphonerWebRTCBroadcastConnection.updatedBroadcasting()"),
                    this.updateStatus(c.eM.COMPLETED),
                    this.emit(c.t2.BROADCASTING),
                    u.Z.updateMeasurement("connectionStream"),
                    u.Z.updateMeasurement("connection")
                }
                ,
                this.resetSession = ()=>{
                    if (t.Z.info("FlashphonerWebRTCBroadcastConnection.resetSession()"),
                    !x(this.config)) {
                        t.Z.warn("FlashphonerWebRTCBroadcastConnection.resetSession() config is not valid", this.config);
                        return
                    }
                    const {streamName: e} = this.config;
                    this.updateLogConnection({
                        message: "Reset session",
                        mediaSessionId: this.sessionId,
                        name: e
                    }),
                    this.socketConnection.send({
                        message: s.mI.UN_PUBLISH_STREAM,
                        data: Q({
                            mediaSessionId: this.sessionId,
                            name: e
                        })
                    })
                }
                ,
                this.onPeerConnectionStats = e=>{
                    t.Z.info("FlashphonerWebRTCBroadcastConnection.onPeerConnectionStats()", e),
                    this.emit(c.t2.UPDATE_STATS, e)
                }
                ,
                this.updateSession = M()(async()=>{
                    const {config: e} = this;
                    if (t.Z.info("FlashphonerWebRTCBroadcastConnection.updateSession()"),
                    !e) {
                        t.Z.info("FlashphonerWebRTCBroadcastConnection.updateSession() config is empty"),
                        this.updateLogConnection({
                            message: "Error update session without required fields"
                        });
                        return
                    }
                    this.sessionId = this.generateSessionId(e.streamName),
                    this.updateLogConnection({
                        message: "Update session"
                    }),
                    await this.initBroadcast(),
                    await this.updatePeerConnection(),
                    await this.updateSocketConnection()
                }
                , E),
                this.updateConnection = e=>{
                    t.Z.info("FlashphonerWebRTCBroadcastConnection.updateConnection()", e);
                    const r = x(e);
                    this.updateFailedConnectionAfterTimeout && this.updateFailedConnectionAfterTimeout.cancel(),
                    r ? (t.Z.info("FlashphonerWebRTCBroadcastConnection.updateConnection() config is valid"),
                    this.updateLogConnection({
                        message: "Update connection"
                    }),
                    this.resetSession(),
                    this.config = e,
                    this.updateSession()) : (t.Z.warn("FlashphonerWebRTCBroadcastConnection.updateConnection() config is not valid"),
                    this.updateLogConnection({
                        message: "Error update connection without required fields",
                        broadcastConfig: e
                    }),
                    this.emit(c.t2.CLOSE_BROADCASTING, {
                        reason: "Required fields is empty"
                    }))
                }
                ,
                this.failedConnection = e=>{
                    t.Z.warn("FlashphonerWebRTCBroadcastConnection.failedConnection()"),
                    this.emit(c.t2.ERROR_BROADCASTING, e)
                }
                ,
                this.updateLogConnection = function() {
                    let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : {};
                    a.emit(c.t2.LOG_BROADCASTING, O(O({}, e), {}, {
                        userAgent: G.L4.userAgent,
                        config: a.config,
                        date: new Date().getTime(),
                        sessionId: a.sessionId
                    }))
                }
                ,
                this.updateFailedConnectionAfterTimeout = M()(e=>{
                    const {message: r} = e
                      , {config: C} = this;
                    this.updateLogConnection(O(O({}, e), {}, {
                        message: "Update failed connection after (".concat(r, ") after timeout")
                    })),
                    this.updateConnection(C)
                }
                , R),
                this.updateFailedConnection = e=>{
                    const {message: r} = e;
                    if (t.Z.warn("FlashphonerWebRTCBroadcastConnection.updateFailedConnection()", e),
                    l.ZP.addSource(l.OF.FLASHPHONER_BROADCAST_ERROR, e),
                    d.Z.send(l.OF.FLASHPHONER_BROADCAST_ERROR, e),
                    this.getIsStatusFailed() && (this.updateLogConnection(O(O({}, e), {}, {
                        message: "Error update failed connection after (".concat(r, ")")
                    })),
                    this.countFailedConnection >= _)) {
                        this.failedConnection(e);
                        return
                    }
                    this.updateStatus(c.eM.FAILED),
                    this.updateLogConnection(O(O({}, e), {}, {
                        message: "Update failed connection after (".concat(r, ")")
                    })),
                    this.updateFailedConnectionAfterTimeout(e)
                }
                ,
                this.failedSocketConnection = ()=>{
                    this.updateFailedConnection({
                        message: "Error socket connection",
                        a: "1"
                    })
                }
                ,
                this.failedPeerConnection = ()=>{
                    this.updateFailedConnection({
                        message: "Error peer connection"
                    })
                }
                ,
                this.updateWebCallServerConnection = ()=>{
                    if (t.Z.info("FlashphonerWebRTCBroadcastConnection.updateWebCallServerConnection()"),
                    u.Z.updateMeasurement("connectionSocket"),
                    u.Z.updateMeasurement("connectionServer"),
                    !this.config)
                        return;
                    const {webRTCAppKey: e} = this.config;
                    this.socketConnection.send({
                        message: s.mI.CONNECTION,
                        data: [{
                            appKey: e,
                            clientBrowserVersion: navigator.userAgent,
                            clientOSVersion: navigator.appVersion,
                            mediaProviders: ["WebRTC"]
                        }]
                    })
                }
                ,
                this.updateSocketConnection = ()=>{
                    t.Z.info("FlashphonerWebRTCBroadcastConnection.updateSocketConnection()");
                    const {streamUrl: e} = this.config;
                    this.socketConnection.updateConnection(e)
                }
                ,
                this.updatePeerConnection = ()=>{
                    t.Z.info("FlashphonerWebRTCBroadcastConnection.updatePeerConnection()");
                    const {stream: e, mediaConfig: r} = this.config;
                    this.peerConnection && this.peerConnection.destroy(),
                    this.peerConnection = new B.Z(r,!0),
                    this.peerConnection.on(c.X7.STATS, this.onPeerConnectionStats),
                    this.peerConnection.on(c.X7.FAILED, this.failedPeerConnection),
                    this.peerConnection.setStream(e)
                }
                ,
                this.updateStream = e=>{
                    const {stream: r} = e;
                    t.Z.info("webRTCConnection.updateBroadcastingStream()", r),
                    this.peerConnection.replaceStream(r)
                }
                ,
                this.destroy = ()=>{
                    t.Z.info("FlashphonerWebRTCBroadcastConnection.destroy()"),
                    this.closeConnection(),
                    this.peerConnection && this.peerConnection.closeConnection(),
                    this.socketConnection && this.socketConnection.closeConnection()
                }
                ,
                this.closeConnection = function() {
                    let e = arguments.length > 0 && arguments[0] !== void 0 ? arguments[0] : "";
                    t.Z.info("FlashphonerWebRTCBroadcastConnection.closeConnection()"),
                    a.config = null,
                    a.socketConnection && a.sessionId && a.socketConnection.send({
                        message: s.mI.UN_PUBLISH_STREAM,
                        data: Q({
                            mediaSessionId: a.sessionId
                        })
                    }),
                    a.updateFailedConnectionAfterTimeout && a.updateFailedConnectionAfterTimeout.cancel(),
                    a.emit(c.t2.CLOSE_BROADCASTING, {
                        reason: e
                    })
                }
                ,
                this.update = M()(e=>{
                    if (t.Z.info("webRTCConnection.updateBroadcastingConnection()", e),
                    I(this.config, e)) {
                        t.Z.warn("webRTCConnection.updateBroadcastingConnection() broadcast config is equal");
                        return
                    }
                    if (!e) {
                        if (!this.config) {
                            t.Z.warn("webRTCConnection.updateBroadcastingConnection() broadcast config is not updated");
                            return
                        }
                        t.Z.info("webRTCConnection.updateBroadcastingConnection() broadcast config is empty"),
                        this.closeConnection("WebRTCBroadcastConnectionUpdate");
                        return
                    }
                    t.Z.info("webRTCConnection.updateBroadcastingConnection() broadcast config was updated");
                    const r = this.getIsStatusComplited() && k(this.config, e);
                    this.config = e,
                    r ? this.updateStream(e) : (u.Z.init("broadcastMeasurement"),
                    u.Z.updateMeasurement("connection"),
                    u.Z.updateMeasurement("connectionSocket"),
                    this.updateConnection(e))
                }
                , p),
                this.resolutions = i.resolutions,
                this.socketConnection = new g.ZP,
                this.socketConnection.on(g.QH.MESSAGE, this.onSocketMessage),
                this.socketConnection.on(g.QH.CONNECTED, this.resumeBroadcastConnection),
                this.socketConnection.on(g.QH.OPEN, this.updateWebCallServerConnection),
                this.socketConnection.on(g.QH.CLOSE, this.failedSocketConnection),
                this.socketConnection.on(g.QH.ERROR, this.failedSocketConnection)
            }
        }
        var ne = null
    },
    80787: function(J, F, n) {
        var b = n(73532)
          , y = n.n(b)
          , N = n(29324)
          , v = n.n(N)
          , Z = n(26078)
          , K = n.n(Z)
          , V = n(60349)
          , j = n.n(V)
          , L = n(83319)
          , M = n.n(L)
          , W = n(31804)
          , H = n.n(W)
          , G = n(42669)
          , l = n.n(G)
          , d = n(50216);
        const s = 5
          , t = 50
          , B = 1e3
          , w = 1e3
          , c = .01
          , u = 10;
        class g {
            constructor(O) {
                this.isInit = !1,
                this.counter = 0,
                this.clientVideoRate = [],
                this.serverVideoRate = [],
                this.peerConnection = void 0,
                this.onVideoRateUpdate = void 0,
                this.init = ()=>{
                    this.isInit = !0,
                    this.counter = 0,
                    this.clientVideoRate = [],
                    this.serverVideoRate = []
                }
                ,
                this.getFilteredList = f=>{
                    const h = f.filter(_=>{
                        let {videoRate: E} = _;
                        return E === 0 || E > w
                    }
                    )
                      , p = v()(h, _=>_.videoRate)
                      , R = h.filter(_=>{
                        let {videoRate: E} = _;
                        if (E === 0)
                            return !0;
                        const P = E >= p * c && E <= p * u;
                        return P || d.Z.warn("webRTCQuality: videoRate=".concat(E, " meanVideoRate=").concat(p)),
                        P
                    }
                    );
                    return y()(R, -t)
                }
                ,
                this.getAccumulateData = f=>M()(f, (h,p)=>{
                    let {audioLevel: R, videoRate: _, frameRate: E} = p;
                    return {
                        videoRate: h.videoRate + _,
                        frameRate: h.frameRate + E,
                        audioLevel: h.audioLevel + (R || 0)
                    }
                }
                , {
                    videoRate: 0,
                    frameRate: 0,
                    audioLevel: 0
                }),
                this.updateBroadcastVideoRate = async()=>{
                    if (!this.isInit)
                        return;
                    const f = this.serverVideoRate
                      , h = this.clientVideoRate;
                    if (this.counter >= s) {
                        const R = this.getAccumulateData(f)
                          , _ = this.getAccumulateData(h)
                          , E = R.videoRate / f.length || 0
                          , P = _.videoRate / h.length || 0
                          , U = _.frameRate / h.length || 0
                          , S = _.audioLevel / h.length || 0
                          , m = R.frameRate / f.length || 0
                          , I = {
                            serverVideoRate: Math.floor(E),
                            clientVideoRate: Math.floor(P),
                            serverFrameRate: Math.floor(m),
                            clientFrameRate: Math.floor(U),
                            clientAudioLevel: S
                        };
                        this.onVideoRateUpdate(I),
                        d.Z.info("webRTCQuality", I),
                        this.counter = 0
                    }
                }
                ,
                this.updateVideoRate = async()=>{
                    !this.isInit || (this.updateClientVideoRateDebounce(),
                    await this.updateBroadcastVideoRate())
                }
                ,
                this.updateClientVideoRateDebounce = H()(()=>{
                    this.counter += 1,
                    this.updateClientVideoRate()
                }
                , B),
                this.updateClientVideoRate = async()=>{
                    if (!!this.isInit) {
                        if (this.peerConnection) {
                            var f, h, p, R, _, E, P, U, S;
                            const m = this.peerConnection.getStats()
                              , I = ((f = m == null || (h = m.video) == null || (p = h[0]) == null ? void 0 : p.bitrate) != null ? f : 0) * 8
                              , k = (R = m == null || (_ = m.video) == null || (E = _[0]) == null ? void 0 : E.frameRate) != null ? R : 0
                              , x = (P = m == null || (U = m.audio) == null || (S = U[0]) == null ? void 0 : S.audioLevel) != null ? P : null;
                            if (j()(I) && !K()(I)) {
                                const Q = [...this.clientVideoRate, {
                                    videoRate: I,
                                    frameRate: k,
                                    audioLevel: x
                                }];
                                this.clientVideoRate = this.getFilteredList(Q)
                            }
                        }
                        this.updateVideoRate()
                    }
                }
                ,
                this.updateServerQuality = f=>{
                    if (!this.isInit)
                        return;
                    const {videoRate: h=0, fps: p=0} = f
                      , R = [...this.serverVideoRate, {
                        videoRate: h,
                        frameRate: p
                    }];
                    this.serverVideoRate = this.getFilteredList(R),
                    this.updateVideoRate()
                }
                ,
                this.updatePeerConnection = f=>{
                    this.peerConnection = f,
                    this.updateClientVideoRateDebounce()
                }
                ,
                this.destroy = ()=>{
                    this.isInit = !1,
                    this.counter = 0,
                    this.clientVideoRate = [],
                    this.serverVideoRate = [],
                    this.peerConnection && (this.peerConnection = null),
                    this.updateClientVideoRateDebounce.cancel()
                }
                ,
                this.onVideoRateUpdate = O.onVideoRateUpdate || l()
            }
        }
        F.Z = g
    }
}]);
