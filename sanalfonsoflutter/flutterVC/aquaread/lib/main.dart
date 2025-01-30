/*import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

void main() {
  runApp(AquaReadApp());
}

class AquaReadApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'AquaReadPro',
      theme: ThemeData(primarySwatch: Colors.blue),
      home: SocioSearchPage(),
    );
  }
}

class SocioSearchPage extends StatefulWidget {
  @override
  _SocioSearchPageState createState() => _SocioSearchPageState();
}

class _SocioSearchPageState extends State<SocioSearchPage> {
  TextEditingController _searchController = TextEditingController();
  bool _isLoading = false;
  Map<String, dynamic>? _socioData;

  Future<void> buscarSocio() async {
    if (_searchController.text.isEmpty) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Ingrese un código de socio o CI'), backgroundColor: Colors.red),
      );
      return;
    }
    
    setState(() => _isLoading = true);
    try {
      final response = await http.get(
        Uri.parse('http://192.168.1.108/api/buscarSocio?codigo=${_searchController.text}'),
      );
      
      if (response.statusCode == 200) {
        final data = json.decode(response.body);
        setState(() => _socioData = data);
      } else {
        _showError('No se encontraron datos');
      }
    } catch (e) {
      _showError('Error de conexión: $e');
    } finally {
      setState(() => _isLoading = false);
    }
  }

  void _showError(String message) {
    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(content: Text(message), backgroundColor: Colors.red),
    );
  }

  void _cerrarSesion() {
    showDialog(
      context: context,
      builder: (context) => AlertDialog(
        title: Text('Cerrar Sesión'),
        content: Text('¿Está seguro de que desea cerrar sesión?'),
        actions: [
          TextButton(onPressed: () => Navigator.pop(context), child: Text('Cancelar')),
          ElevatedButton(
            onPressed: () {
              Navigator.pushAndRemoveUntil(
                context,
                MaterialPageRoute(builder: (context) => LoginPage()),
                (route) => false,
              );
            },
            child: Text('Confirmar'),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Buscar Socio'),
        actions: [
          IconButton(icon: Icon(Icons.logout), onPressed: _cerrarSesion),
        ],
      ),
      body: Padding(
        padding: EdgeInsets.all(16.0),
        child: Column(
          children: [
            TextField(
              controller: _searchController,
              decoration: InputDecoration(labelText: 'Código Socio', suffixIcon: IconButton(icon: Icon(Icons.search), onPressed: buscarSocio)),
            ),
            SizedBox(height: 20),
            _isLoading
                ? CircularProgressIndicator()
                : _socioData == null
                    ? Text('No se encontraron datos')
                    : SocioDetalle(socioData: _socioData!),
          ],
        ),
      ),
    );
  }
}

class SocioDetalle extends StatelessWidget {
  final Map<String, dynamic> socioData;
  SocioDetalle({required this.socioData});

  void _mostrarModalLectura(BuildContext context, {bool modificar = false}) {
    showDialog(
      context: context,
      builder: (context) => NuevaLecturaScreen(
        codigoSocio: socioData['codigo_socio'],
        lecturaAnterior: socioData['lectura_actual'],
        modificar: modificar,
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Card(
      child: Padding(
        padding: EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text('Código: ${socioData['codigo_socio']}', style: TextStyle(fontWeight: FontWeight.bold)),
            Text('Socio: ${socioData['nombre']}'),
            Text('Lectura Actual: ${socioData['lectura_actual']}'),
            SizedBox(height: 10),
            Row(
              children: [
                ElevatedButton(onPressed: () => _mostrarModalLectura(context), child: Text('Registrar Lectura')),
                SizedBox(width: 10),
                ElevatedButton(onPressed: () => _mostrarModalLectura(context, modificar: true), child: Text('Modificar Lectura')),
              ],
            )
          ],
        ),
      ),
    );
  }
}

class NuevaLecturaScreen extends StatelessWidget {
  final String codigoSocio;
  final int lecturaAnterior;
  final bool modificar;
  
  NuevaLecturaScreen({required this.codigoSocio, required this.lecturaAnterior, this.modificar = false});

  final TextEditingController _lecturaController = TextEditingController();

  Future<void> registrarLectura(BuildContext context) async {
    if (_lecturaController.text.isEmpty) return;
    
    final url = modificar
        ? 'http://192.168.1.108/api/modificarLectura'
        : 'http://192.168.1.108/api/registrarLectura';
    
    await http.post(
      Uri.parse(url),
      headers: {'Content-Type': 'application/json'},
      body: json.encode({'codigo_socio': codigoSocio, 'lectura_actual': int.parse(_lecturaController.text)}),
    );
    Navigator.pop(context, true);
  }

  @override
  Widget build(BuildContext context) {
    return AlertDialog(
      title: Text(modificar ? 'Modificar Lectura' : 'Ingresar Nueva Lectura'),
      content: TextField(controller: _lecturaController, keyboardType: TextInputType.number, decoration: InputDecoration(labelText: 'Lectura Nueva')),
      actions: [
        TextButton(onPressed: () => Navigator.pop(context), child: Text('Cancelar')),
        ElevatedButton(onPressed: () => registrarLectura(context), child: Text(modificar ? 'Modificar' : 'Registrar')),
      ],
    );
  }
}

class LoginPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Login')),
      body: Center(child: Text('Aquí irá la pantalla de Login')),
    );
  }
}
*/

//////
///
///
import 'package:flutter/material.dart';
import 'webview.dart';

void main() {
  runApp(MaterialApp(
    debugShowCheckedModeBanner: false,
    home: WebViewScreen(), // Abre la WebView directamente
  ));
}
