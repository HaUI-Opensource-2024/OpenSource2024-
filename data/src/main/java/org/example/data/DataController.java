package org.example.data;

import lombok.RequiredArgsConstructor;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;


@RestController
@RequestMapping("/haui/open-source/data")
@RequiredArgsConstructor
public class DataController {

    final DataService dataService;

    @GetMapping
    public ResponseEntity<?> getData(){
        var response = dataService.getData();
        return ResponseEntity.accepted().body(response);
    }

    @PostMapping
    public void addData(@RequestBody DataRequest request){
        dataService.add(request);
    }
}
