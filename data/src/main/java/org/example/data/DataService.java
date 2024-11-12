package org.example.data;

import lombok.RequiredArgsConstructor;
import org.springframework.stereotype.Service;

import java.util.HashMap;
import java.util.List;
import java.util.Map;

@RequiredArgsConstructor
@Service
public class DataService {
    final DataRepository dataRepository;

    public Response getData(){
        Map<String, DataResponse> free = new HashMap<>();
        Map<String, DataResponse> pro = new HashMap<>();
        List<DataEntity> list= dataRepository.findAll();
        for(DataEntity x : list){
            DataResponse dataResponse = new DataResponse();
            dataResponse.setId(x.getId());
            dataResponse.setPro(x.isPro());
            dataResponse.setDescription(x.getDescription());
            dataResponse.setTitle(x.getTitle());
            dataResponse.setPrompt(x.getPrompt());
            dataResponse.setField(x.getFields().toString());
            if(x.isPro()) {
                pro.put(x.getTitle(), dataResponse);
            }else{
                free.put(x.getTitle(), dataResponse);
            }
        }
        return new Response(free, pro);
    }

    public void add(DataRequest request){
        DataEntity dataEntity = new DataEntity();
        dataEntity.setTitle(request.getTitle());
        dataEntity.setDescription(request.getDescription());
        dataEntity.setPrompt(request.getPrompt());
        dataEntity.setPro(request.isPro());
        dataEntity.setFields(request.getFields());
        dataRepository.save(dataEntity);
    }
}
