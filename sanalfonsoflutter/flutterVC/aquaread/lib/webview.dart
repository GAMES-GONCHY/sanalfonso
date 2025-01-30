import 'package:flutter/foundation.dart'
    show defaultTargetPlatform, TargetPlatform;
import 'package:flutter/material.dart';
import 'package:webview_flutter/webview_flutter.dart';

class WebViewScreen extends StatefulWidget {
  @override
  _WebViewScreenState createState() => _WebViewScreenState();
}

class _WebViewScreenState extends State<WebViewScreen> {
  late final WebViewController _controller;

  @override
  void initState() {
    super.initState();

    if (defaultTargetPlatform == TargetPlatform.android ||
        defaultTargetPlatform == TargetPlatform.iOS) {
      _controller = WebViewController()
        ..setJavaScriptMode(JavaScriptMode.unrestricted)
        ..setBackgroundColor(const Color(0x00000000))
        ..loadRequest(Uri.parse(
            "http://192.168.1.108/tercerAnio/sanalfonso/codeigniter/index.php/usuario/index"));
    }
  }

  @override
  Widget build(BuildContext context) {
    if (defaultTargetPlatform == TargetPlatform.android ||
        defaultTargetPlatform == TargetPlatform.iOS) {
      return Scaffold(
        body: WebViewWidget(controller: _controller),
      );
    } else {
      return Scaffold(
        body: Center(
          child: Text(
              "WebView no es compatible en Windows. Usa un emulador de Android o un dispositivo físico."),
        ),
      );
    }
  }
}
